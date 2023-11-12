<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Adress;
use App\Form\AdressType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setFormTypeOption('disabled', 'disabled'),
            EmailField::new('email')->hideOnIndex(),
            TextField::new('plainPassword', 'Nouveau mot de passe')->onlyOnForms(),
            TextField::new('firstName', 'Prénom'),
            TextField::new('lastName', 'Nom'),
            // ChoiceField::new('gender', 'Genre')
            // ->setChoices([
            //     'Homme' => true,
            //     'Femme' => false,
            // ])
            // ->allowMultipleChoices(false),
            BooleanField::new('isASeller', 'Vendeur'),
            AssociationField::new('adress', 'Adresse')
            ->setFormType(AdressType::class)
                ->hideOnIndex(),
            
    
        ];
    }

}
