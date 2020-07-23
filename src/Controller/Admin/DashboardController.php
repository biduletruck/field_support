<?php

namespace App\Controller\Admin;

use App\Entity\Advisors;
use App\Entity\Categories;
use App\Entity\Choices;
use App\Entity\SubCategories;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Field Support');
    }

    public function configureMenuItems(): iterable
    {
//        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
        yield MenuItem::section('Administration');
        yield MenuItem::linkToCrud('Utilisateurs', null, Users::class);
        yield MenuItem::linkToCrud('Conseiller', null, Advisors::class);
        yield MenuItem::section('Gestion des catégories');
        yield MenuItem::linkToCrud('Categories', null, Categories::class);
        yield MenuItem::linkToCrud('SubCategories', null, SubCategories::class);
        yield MenuItem::section('Retours terrain');
        yield MenuItem::linkToCrud('Choices', null, Choices::class);
    }
}
