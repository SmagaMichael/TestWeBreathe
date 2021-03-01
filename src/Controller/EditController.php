<?php

namespace App\Controller;

use App\Entity\Module;
use App\Form\AddModuleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    /**
     * @Route("/module/modifier/{id}", name="edit")
     */
    public function edit(Request $request, Module $Module):Response{
        //On crée le formulaire a partir de AddProductFormType (dans le dossier form)
        //symfony rempli l'objet $OneProduct avec les données du formulaire
        // grâce à la request
        $form = $this->createForm(AddModuleFormType::class, $Module);

        //Permet de lié le formulaire à la requete (pour récuperer le $_POST)
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

             $image= $form->get('image')->getData();

        if($image){

            $defaultImages = ['default.png'];

            if($Module->getImage() && !in_array($Module->getImage(), $defaultImages )) {
                // FileSystem permet de manipuler les fichiers
                $fs = new Filesystem();
                // On supprime l'ancienne image
                $fs->remove($this->getParameter('upload_directory').'/'.$Module->getImage());
                
            }

            $filename = uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('upload_directory'), $filename);
            $Module->setImage($filename);

        }

        

            //On ajoute l'objet dans la BDD
            //On récupere le service doctrine qui permet de gérer la base de données
        $this->getDoctrine()->getManager()->flush();

        //_______Redirection et message de succes________________________
         $this->addFlash('success', 'votre module a bien été modifié');
         return $this->redirecttoRoute('modules');

        }
    


    return $this->render('edit/index.html.twig', [
        'AddModuleFormType' => $form->createView(),
        'Module' => $Module
    ]);
}
}
