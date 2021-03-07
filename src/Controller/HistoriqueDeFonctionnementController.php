<?php

namespace App\Controller;

use App\Entity\Historique;
use App\Repository\HistoriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoriqueDeFonctionnementController extends AbstractController
{
    /**
     * @Route("/historique/de/fonctionnement", name="historique_de_fonctionnement")
     */
    public function index(HistoriqueRepository $historiqueRepository): Response
    {

          
        //la on appelle la table Module
        $repository = $this->getDoctrine()->getRepository(Historique::class);
        //Affiche tout les modules disponible
        $commentaires = $repository->findAll();






        return $this->render('historique_de_fonctionnement/index.html.twig', [
            'commentaires' => $commentaires,
        ]);
    }
}
