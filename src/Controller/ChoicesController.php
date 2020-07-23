<?php

namespace App\Controller;

use App\Entity\Choices;
use App\Form\ChoicesType;
use App\Repository\ChoicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/choices")
 */
class ChoicesController extends AbstractController
{
    /**
     * @Route("/", name="choices_index", methods={"GET"})
     */
    public function index(ChoicesRepository $choicesRepository): Response
    {
        return $this->render('choices/index.html.twig', [
            'choices' => $choicesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="choices_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $choice = new Choices();
        $form = $this->createForm(ChoicesType::class, $choice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($choice);
            $entityManager->flush();

            return $this->redirectToRoute('choices_index');
        }

        return $this->render('choices/new.html.twig', [
            'choice' => $choice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="choices_show", methods={"GET"})
     */
    public function show(Choices $choice): Response
    {
        return $this->render('choices/show.html.twig', [
            'choice' => $choice,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="choices_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Choices $choice): Response
    {
        $form = $this->createForm(ChoicesType::class, $choice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('choices_index');
        }

        return $this->render('choices/edit.html.twig', [
            'choice' => $choice,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="choices_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Choices $choice): Response
    {
        if ($this->isCsrfTokenValid('delete'.$choice->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($choice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('choices_index');
    }
}
