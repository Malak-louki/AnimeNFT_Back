<?php

namespace App\Controller\Admin;

use App\Entity\Eth;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EthCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Eth::class;
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
