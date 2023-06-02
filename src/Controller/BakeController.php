<?php

namespace App\Controller;

use App\Entity\Bake;
use App\Form\BakeType;
use App\Repository\BakeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bake')]
class BakeController extends AbstractController
{
    #[Route('/', name: 'app_bake_index', methods: ['GET'])]
    public function index(BakeRepository $bakeRepository): Response
    {
        return $this->render('bake/index.html.twig', [
            'bakes' => $bakeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bake_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BakeRepository $bakeRepository): Response
    {
        $bake = new Bake();
        $form = $this->createForm(BakeType::class, $bake);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bakeRepository->save($bake, true);

            return $this->redirectToRoute('app_bake_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bake/new.html.twig', [
            'bake' => $bake,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bake_show', methods: ['GET'])]
    public function show(Bake $bake): Response
    {
        return $this->render('bake/show.html.twig', [
            'bake' => $bake,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bake_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bake $bake, BakeRepository $bakeRepository): Response
    {
        $form = $this->createForm(BakeType::class, $bake);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bakeRepository->save($bake, true);

            return $this->redirectToRoute('app_bake_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bake/edit.html.twig', [
            'bake' => $bake,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bake_delete', methods: ['POST'])]
    public function delete(Request $request, Bake $bake, BakeRepository $bakeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bake->getId(), $request->request->get('_token'))) {
            $bakeRepository->remove($bake, true);
        }

        return $this->redirectToRoute('app_bake_index', [], Response::HTTP_SEE_OTHER);
    }
}
