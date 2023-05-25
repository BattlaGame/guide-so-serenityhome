<?php

namespace App\Controller;

use App\Entity\Poubelle;
use App\Form\PoubelleType;
use App\Repository\PoubelleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/poubelle')]
class PoubelleController extends AbstractController
{
    #[Route('/', name: 'app_poubelle_index', methods: ['GET'])]
    public function index(PoubelleRepository $poubelleRepository): Response
    {
        return $this->render('poubelle/index.html.twig', [
            'poubelles' => $poubelleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_poubelle_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PoubelleRepository $poubelleRepository): Response
    {
        $poubelle = new Poubelle();
        $form = $this->createForm(PoubelleType::class, $poubelle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $poubelleRepository->save($poubelle, true);

            return $this->redirectToRoute('app_poubelle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('poubelle/new.html.twig', [
            'poubelle' => $poubelle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_poubelle_show', methods: ['GET'])]
    public function show(Poubelle $poubelle): Response
    {
        return $this->render('poubelle/show.html.twig', [
            'poubelle' => $poubelle,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_poubelle_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Poubelle $poubelle, PoubelleRepository $poubelleRepository): Response
    {
        $form = $this->createForm(PoubelleType::class, $poubelle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $poubelleRepository->save($poubelle, true);

            return $this->redirectToRoute('app_poubelle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('poubelle/edit.html.twig', [
            'poubelle' => $poubelle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_poubelle_delete', methods: ['POST'])]
    public function delete(Request $request, Poubelle $poubelle, PoubelleRepository $poubelleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$poubelle->getId(), $request->request->get('_token'))) {
            $poubelleRepository->remove($poubelle, true);
        }

        return $this->redirectToRoute('app_poubelle_index', [], Response::HTTP_SEE_OTHER);
    }
}
