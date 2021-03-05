<?php

namespace App\Controller;

use App\Entity\Module;
use App\Entity\ModuleCategory;
use App\Repository\ModuleCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category")
     */
    public function index($id, Request $request, ModuleCategoryRepository $moduleCategoryRepository): Response
    {

        //la on appelle la table Module
        $repository = $this->getDoctrine()->getRepository(Module::class);

        //appelle la méthode 
        $ModuleByCategory = $repository->FindCategory($id);
        

        //Affiche du menu de catégorie
        $categories = $moduleCategoryRepository->findAll();







        return $this->render('category/index.html.twig', [
            'categories'=> $categories,
            'ModuleByCategory' => $ModuleByCategory

        ]);
    }
}
