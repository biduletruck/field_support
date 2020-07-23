<?php

namespace App\Controller\Admin;

use App\Entity\Advisors;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdvisorsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Advisors::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Firstname'),
            TextField::new('Lastname'),
            TextField::new('Login'),
            BooleanField::new('Active'),
        ];
    }

}
