<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    //redirect to homePage
    #[Route('/',name:'edx')]
    public function redir(): Response
    {
        return $this->redirectToRoute('app_app');
    }
    #[Route('/app', name: 'app_app')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig');
    }
}
