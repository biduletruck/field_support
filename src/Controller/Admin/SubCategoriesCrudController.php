<?php

namespace App\Controller\Admin;

use App\Entity\SubCategories;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SubCategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SubCategories::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('Category'),
            TextField::new('Name'),
            BooleanField::new('Active'),
        ];
    }

}
