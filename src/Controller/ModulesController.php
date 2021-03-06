<?php

namespace App\Controller;

use App\Entity\Module;
use App\Repository\ModuleCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModulesController extends AbstractController
{
    /**
     * @Route("/modules", name="modules")
     */

    public function index(ModuleCategoryRepository $moduleCategoryRepository, Request $request): Response
    {

        
        //la on appelle la table Module
        $repository = $this->getDoctrine()->getRepository(Module::class);
        //Affiche tout les modules disponible
        $Modules = $repository->findAll();

        //Affiche du menu de catégorie
        $category = $moduleCategoryRepository->findAll();


        return $this->render('modules/index.html.twig', [
            'modules' => $Modules,
            'categories'=> $category

        ]);
    }

   
    /**
     * @Route("/module/fonctionne/{id}", name="marche")
     */
    public function EtatMarche($id,Module $Module): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $repository = $entityManager->getRepository(Module::class)->find($id);
        
        $repository->setEtatDeMarche("1");
        dump($repository);

        $entityManager->flush();
        
        $this->addFlash('sucess', 'Votre produit fonctionne');
        return $this->redirecttoRoute('modules');
  
    }

    
    /**
     * @Route("/module/arret/{id}", name="arret")
     */
    public function EtatArret($id,Module $Module): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $repository = $entityManager->getRepository(Module::class)->find($id);
        
        $repository->setEtatDeMarche("0");
        dump($repository);

        $entityManager->flush();
        
        $this->addFlash('danger', 'Votre produit a bien été arrêté');
        return $this->redirecttoRoute('modules');
  
    }



}
