<?php

namespace App\Controller;

use App\Entity\Appartement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteFrontController extends AbstractController
{
    #[Route('/{nom}', name: 'app_appartement_show', methods: ['GET'])]
    public function show(Appartement $appartement): Response
    {
        return $this->render('siteFront/appartement.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{nom}/Electromenager', name: 'app_appartement_listeElec', methods: ['GET'])]
    public function listeElec(Appartement $appartement): Response
    {
        return $this->render('siteFront/listeElectromenager.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{nom}/Checkin', name: 'app_appartement_listeCheckin', methods: ['GET'])]
    public function listeCheckin(Appartement $appartement): Response
    {
        return $this->render('siteFront/listeCheckin.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{nom}/Info', name: 'app_appartement_info', methods: ['GET'])]
    public function info(Appartement $appartement): Response
    {
        return $this->render('siteFront/info.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route(' /{nom}/Numero', name: 'app_appartement_numero', methods: ['GET'])]
    public function numero(Appartement $appartement): Response
    {
        return $this->render('siteFront/numero.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{nom}/Checkout', name: 'app_appartement_checkout', methods: ['GET'])]
    public function checkout(Appartement $appartement): Response
    {
        return $this->render('siteFront/checkout.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{nom}/Autour', name: 'app_appartement_autour', methods: ['GET'])]
    public function autour(Appartement $appartement): Response
    {
        return $this->render('siteFront/autour.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{nom}/Wifi', name: 'app_appartement_wifi', methods: ['GET'])]
    public function wifi(Appartement $appartement): Response
    {
        return $this->render('siteFront/wifi.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{nom}/Parking', name: 'app_appartement_parking', methods: ['GET'])]
    public function parking(Appartement $appartement): Response
    {
        return $this->render('siteFront/parking.html.twig', [
            'appartement' => $appartement,
        ]);
    }

}


