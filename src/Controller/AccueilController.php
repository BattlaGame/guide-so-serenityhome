<?php

namespace App\Controller;

use App\Entity\Accueil;
use App\Form\AccueilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('siteFront/accueil.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/numero', name: 'app_numero')]
    public function numero(): Response
    {
        return $this->render('siteFront/numero.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/info', name: 'app_info')]
    public function info(): Response
    {
        return $this->render('siteFront/info.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/checkout', name: 'app_checkout')]
    public function checkout(): Response
    {
        return $this->render('siteFront/checkout.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/autour', name: 'app_autour')]
    public function autour(): Response
    {
        return $this->render('siteFront/autour.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}



