<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle;
use App\Entity\Adress;
use App\Entity\Category;
use App\Entity\Eth;
use App\Entity\Image;
use App\Entity\Nft;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('AnimeNFT');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Adresses', 'fas fa-list', Adress::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud("les cours de l'ETH", 'fas fa-list', Eth::class);
        yield MenuItem::linkToCrud('Les images NFT', 'fas fa-list', Image::class);
        yield MenuItem::linkToCrud('Les NFTs', 'fas fa-list', Nft::class);
        yield MenuItem::linkToCrud('Les utilisateurs', 'fas fa-list', User::class);
    }
}