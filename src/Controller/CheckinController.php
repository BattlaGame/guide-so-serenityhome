<?php

namespace App\Controller;

use App\Entity\Checkin;
use App\Form\CheckinType;
use App\Repository\CheckinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/checkin')]
class CheckinController extends AbstractController
{
    #[Route('/', name: 'app_checkin_index', methods: ['GET'])]
    public function index(CheckinRepository $checkinRepository): Response
    {
        return $this->render('checkin/index.html.twig', [
            'checkins' => $checkinRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_checkin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CheckinRepository $checkinRepository): Response
    {
        $checkin = new Checkin();
        $form = $this->createForm(CheckinType::class, $checkin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $checkinRepository->save($checkin, true);

            return $this->redirectToRoute('app_checkin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('checkin/new.html.twig', [
            'checkin' => $checkin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_checkin_show', methods: ['GET'])]
    public function show(Checkin $checkin): Response
    {
        return $this->render('checkin/show.html.twig', [
            'checkin' => $checkin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_checkin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Checkin $checkin, CheckinRepository $checkinRepository): Response
    {
        $form = $this->createForm(CheckinType::class, $checkin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $checkinRepository->save($checkin, true);

            return $this->redirectToRoute('app_checkin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('checkin/edit.html.twig', [
            'checkin' => $checkin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_checkin_delete', methods: ['POST'])]
    public function delete(Request $request, Checkin $checkin, CheckinRepository $checkinRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$checkin->getId(), $request->request->get('_token'))) {
            $checkinRepository->remove($checkin, true);
        }

        return $this->redirectToRoute('app_checkin_index', [], Response::HTTP_SEE_OTHER);
    }
}
