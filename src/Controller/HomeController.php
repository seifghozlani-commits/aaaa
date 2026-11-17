<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/seif', name: 'app_acceuil')]
    public function index(): Response
    {
        return $this->render('home/acceuil.html.twig', []);
    }
    #[Route('/accueil', name: 'app_accueil_redirect')]
    public function accueilRedirect(): Response
    {
        return $this->redirectToRoute('app_acceuil');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig', []);
    }
    #[Route('/about', name: 'app_about')]
    public function apropos(): Response
    {
        return $this->render('home/about.html.twig', []);
    }
    #[Route('/find-jobs', name: 'app_find_jobs')]
    public function findJobs(): Response
    {
        return $this->render('home/app_find_jobs.html.twig', []);
    }
    #[Route('/post-jobs', name: 'app_post_jobs')]
    public function postJobs(): Response
    {
        return $this->render('home/app_post_jobs.html.twig', []);
    }
}
