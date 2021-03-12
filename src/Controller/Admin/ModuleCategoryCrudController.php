<?php

namespace App\Controller\Admin;

use App\Entity\ModuleCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ModuleCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModuleCategory::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
