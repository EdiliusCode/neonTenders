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
        if ($this->getUser()) {
            return $this->redirectToRoute('app_app');
        }
        else {
            return $this->redirectToRoute('app_login');
        }
    }
    
    #[Route('/app', name: 'app_app')]
    public function index(): Response
    {
        if ($this->getUser()) {
            return $this->render('app/index.html.twig');
        }
        else {
            return $this->redirectToRoute('app_login');
        }
       
    }
}
