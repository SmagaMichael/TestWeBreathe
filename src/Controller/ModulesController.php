<?php

namespace App\Controller;

use App\Entity\Module;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModulesController extends AbstractController
{
    /**
     * @Route("/modules", name="modules")
     */
    public function index(Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(Module::class);
        $Modules = $repository->findAll();


        return $this->render('modules/index.html.twig', [
            'modules' => $Modules,
        ]);
    }
}
