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
}
