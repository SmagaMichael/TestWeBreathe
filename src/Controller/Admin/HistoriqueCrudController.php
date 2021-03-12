<?php

namespace App\Controller\Admin;

use App\Entity\Historique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HistoriqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Historique::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           TextField::new('Commentaire')
           
        ];
    }
    
}
