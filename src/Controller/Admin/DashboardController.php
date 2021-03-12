<?php

namespace App\Controller\Admin;

use App\Entity\Historique;
use App\Entity\Module;
use App\Entity\ModuleCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/easyadmin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('TestWeBreathe');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Modules', 'fas fa-list', Module::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', ModuleCategory::class);
        yield MenuItem::linkToCrud('Historique', 'fas fa-list', Historique::class);
    }
}
