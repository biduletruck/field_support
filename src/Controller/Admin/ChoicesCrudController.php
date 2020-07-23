<?php

namespace App\Controller\Admin;

use App\Entity\Choices;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;


class ChoicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Choices::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('Advisor'),
            AssociationField::new('Category'),
            AssociationField::new('SubCategory'),
            TextareaField::new('Comments'),
            AssociationField::new('User'),
        ];
    }

}
