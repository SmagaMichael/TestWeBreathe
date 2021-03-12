<?php

namespace App\Controller\Admin;

use App\Entity\Module;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Float_;

class ModuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Module::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
          
            TextField::new('name'),
            TextField::new('description'),
            NumberField::new('temperature'),
            NumberField::new('duree_fonctionnement'),
            NumberField::new('etat_de_marche'),
            ImageField::new('image')->setBasePath('img/module')->setUploadDir('public/img/module/'),
            AssociationField::new('Category','Categorie'),
            
        ];
    }
    
}
