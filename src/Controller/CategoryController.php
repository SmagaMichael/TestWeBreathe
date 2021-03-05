<?php

namespace App\Controller;

use App\Entity\Module;
use App\Repository\ModuleCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category{id}", name="category")
     */
    public function index($id, Request $request, ModuleCategoryRepository $moduleCategoryRepository): Response
    {

        // //la on appelle la table OneProduct
        // $repository = $this->getDoctrine()->getRepository(Module::class);
        // //je veux les modules qui on l'id que je veux
        // $modules = $repository->FindCategory($id);

        // $category = $moduleCategoryRepository->findAll();







        return $this->render('category/index.html.twig', [
            'modules'=> $modules,
            'category'=> $category
        ]);
    }
}
