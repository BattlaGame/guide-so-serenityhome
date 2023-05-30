<?php

namespace App\Controller;

use App\Entity\Appartement;
use App\Entity\Poubelle;
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

    #[Route('/{id}/listeElec', name: 'app_appartement_listeElec', methods: ['GET'])]
    public function listeElec(Appartement $appartement): Response
    {
        return $this->render('siteFront/listeElectromenager.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{id}/listeCheckin', name: 'app_appartement_listeCheckin', methods: ['GET'])]
    public function listeCheckin(Appartement $appartement): Response
    {
        return $this->render('siteFront/listeCheckin.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{id}/listePoubelle', name: 'app_appartement_listePoubelle', methods: ['GET'])]
    public function listePoubelle(Appartement $appartement): Response
    {
        return $this->render('siteFront/listePoubelle.html.twig', [
            'appartement' => $appartement,
        ]);
    }

    #[Route('/{nom}/info', name: 'app_appartement_info', methods: ['GET'])]
    public function info(Appartement $appartement, Poubelle $poubelle): Response
    {
        return $this->render('siteFront/info.html.twig', [
            'appartement' => $appartement,
            'poubelle' => $poubelle,
        ]);
    }

}


