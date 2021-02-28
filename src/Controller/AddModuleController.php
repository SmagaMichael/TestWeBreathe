<?php

namespace App\Controller;

use App\Entity\Module;
use App\Form\AddModuleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddModuleController extends AbstractController
{
    /**
     * @Route("/add/module", name="add_module")
     */

        public function create(Request $request):Response{

            $Module = new Module();

            $form = $this->createForm(AddModuleFormType::class, $Module);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){

                //On ajoute l'objet dans la BDD
                //On récupere le service doctrine qui permet de gérer la base de données
             $entityManager = $this->getDoctrine()->getManager();
                //On doit mettre l'objet en attente
             $entityManager->persist($Module);
                //On exécute la requete
             $entityManager->flush();

            //_______Redirection et message de succes________________________
            $this->addFlash('success', 'votre module '.$Module->getName().' a bien été ajouté');
             return $this->redirecttoRoute('modules');

            }
        


        return $this->render('add_module/index.html.twig', [
            'AddModuleFormType' => $form->createView(),
        ]);
    }
}
