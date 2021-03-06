<?php

namespace App\Controller;

use App\Entity\Module;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteController extends AbstractController
{
    /**
     * @Route("/module/supprimer/{id}", name="delete")
     */
    public function delete(Module $Module): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($Module);
        $entityManager->flush();
  
        $this->addFlash('danger', 'Votre produit a bien été supprimé');
        return $this->redirecttoRoute('modules');
  
    }
    
}
