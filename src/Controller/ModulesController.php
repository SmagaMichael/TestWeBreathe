<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModulesController extends AbstractController
{
    /**
     * @Route("/modules", name="modules")
     */
    public function index(): Response
    {
        return $this->render('modules/index.html.twig', [
            'controller_name' => 'ModulesController',
        ]);
    }
}
