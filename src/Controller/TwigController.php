<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwigController extends AbstractController
{
    #[Route('/twig', name: 'app_twig')]
    public function index(): Response
    {

        return $this->render('twig/index.html.twig', [
            'controller_name' => 'TwigController',
            'dateDeDemain'=>new \DateTime('+1day')
        ]);
    }




    #[Route('/home', name: 'home')]
    public function home():Response
    {
    
    
    return $this->render('home/home.html.twig',[]);
    
    }
}
