<?php

namespace App\Controller;

use App\Entity\Appartement;
use App\Entity\Electromenager;
use App\Form\ElectromenagerType;
use App\Repository\ElectromenagerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/electromenager')]
class ElectromenagerController extends AbstractController
{
    #[Route('/', name: 'app_electromenager_index', methods: ['GET'])]
    public function index(ElectromenagerRepository $electromenagerRepository): Response
    {
        return $this->render('electromenager/index.html.twig', [
            'electromenagers' => $electromenagerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_electromenager_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ElectromenagerRepository $electromenagerRepository): Response
    {
        $electromenager = new Electromenager();
        $form = $this->createForm(ElectromenagerType::class, $electromenager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $electromenagerRepository->save($electromenager, true);

            return $this->redirectToRoute('app_electromenager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('electromenager/new.html.twig', [
            'electromenager' => $electromenager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_electromenager_show', methods: ['GET'])]
    public function show(Electromenager $electromenager): Response
    {
        return $this->render('electromenager/show.html.twig', [
            'electromenager' => $electromenager,
            'test' => $electromenager
        ]);
    }

    #[Route('/{id}/edit', name: 'app_electromenager_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Electromenager $electromenager, ElectromenagerRepository $electromenagerRepository): Response
    {
        $form = $this->createForm(ElectromenagerType::class, $electromenager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $electromenagerRepository->save($electromenager, true);

            return $this->redirectToRoute('app_electromenager_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('electromenager/edit.html.twig', [
            'electromenager' => $electromenager,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_electromenager_delete', methods: ['POST'])]
    public function delete(Request $request, Electromenager $electromenager, ElectromenagerRepository $electromenagerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$electromenager->getId(), $request->request->get('_token'))) {
            $electromenagerRepository->remove($electromenager, true);
        }

        return $this->redirectToRoute('app_electromenager_index', [], Response::HTTP_SEE_OTHER);
    }
}
