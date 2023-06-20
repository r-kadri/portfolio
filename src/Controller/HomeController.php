<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->redirectToRoute("app_home");
    }


    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home/index.html.twig');
    }


    #[Route('/stage', name: 'app_stage')]
    public function stage(): Response
    {
        return $this->render('home/stage.html.twig', [
            'title' => 'Ryan KADRI - Mon stage'
        ]);
    }
}
