<?php

namespace App\Controller;

use App\Entity\Appartement;
use App\Entity\Wifi;
use App\Form\WifiType;
use App\Repository\WifiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/wifi')]
class WifiController extends AbstractController
{
    #[Route('/', name: 'app_wifi_index', methods: ['GET'])]
    public function index(WifiRepository $wifiRepository): Response
    {
        return $this->render('wifi/index.html.twig', [
            'wifis' => $wifiRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_wifi_new', methods: ['GET', 'POST'])]
    public function new(Request $request, WifiRepository $wifiRepository): Response
    {
        $wifi = new Wifi();
        $form = $this->createForm(WifiType::class, $wifi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $wifiRepository->save($wifi, true);

            return $this->redirectToRoute('app_wifi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wifi/new.html.twig', [
            'wifi' => $wifi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_wifi_show', methods: ['GET'])]
    public function show(Wifi $wifi): Response
    {
        return $this->render('siteFront/wifi.html.twig', [
            'wifi' => $wifi,
            'test' => $wifi
        ]);
    }

    #[Route('/{id}/edit', name: 'app_wifi_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Wifi $wifi, WifiRepository $wifiRepository): Response
    {
        $form = $this->createForm(WifiType::class, $wifi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $wifiRepository->save($wifi, true);

            return $this->redirectToRoute('app_wifi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('wifi/edit.html.twig', [
            'wifi' => $wifi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_wifi_delete', methods: ['POST'])]
    public function delete(Request $request, Wifi $wifi, WifiRepository $wifiRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$wifi->getId(), $request->request->get('_token'))) {
            $wifiRepository->remove($wifi, true);
        }

        return $this->redirectToRoute('app_wifi_index', [], Response::HTTP_SEE_OTHER);
    }
}
