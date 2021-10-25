<?php

namespace App\Controller\Admin;
use App\Entity\Post;
use App\Entity\User;
use App\Entity\Category;
use App\Controller\Admin\OrderCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //$routeBuilder = $this->get(CrudUrlGenerator::class);

        //return $this->redirect($routeBuilder->setController(PostCrudController::class)->generateUrl());
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig');
    }
     /**
     * @Route("/profile", name="profile")
     */
    public function profile(): Response
    {
        //$routeBuilder = $this->get(CrudUrlGenerator::class);

        //return $this->redirect($routeBuilder->setController(PostCrudController::class)->generateUrl());
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig');
    }
    

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Monblog');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', Post::class);
         yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
    }
}
