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
        return $this->render('accueil/accueil.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/numero', name: 'app_numero')]
    public function numero(): Response
    {
        return $this->render('accueil/numero.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/wifi', name: 'app_wifi')]
    public function wifi(): Response
    {
        return $this->render('accueil/wifi.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/info', name: 'app_indo')]
    public function info(): Response
    {
        return $this->render('accueil/info.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}



