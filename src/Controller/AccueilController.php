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

    #[Route('/numero', name: 'app_numero')]
    public function numero(): Response
    {
        return $this->render('siteFront/numero.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}



