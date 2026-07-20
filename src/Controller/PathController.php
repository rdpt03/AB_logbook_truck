<?php

namespace App\Controller;

use App\Entity\Path;
use App\Form\PathFormType;
use App\Repository\PathRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/path')]
class PathController extends AbstractController
{

    #[Route('/', name: 'path_index')]
    public function index(PathRepository $pathRepository): Response
    {
        return $this->render('path/index.html.twig', [
            'paths' => $pathRepository->findAll(),
        ]);

    }



    #[Route('/new', name: 'path_new')]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        $path = new Path();

        $form = $this->createForm(PathFormType::class, $path);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($path);
            $entityManager->flush();

            return $this->redirectToRoute('path_index');
        }


        return $this->render('path/new.html.twig', [
            'form' => $form
        ]);
    }


    #[Route('/{id}/edit', name: 'path_edit')]
    public function edit(
        Path $path,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        $form = $this->createForm(PathFormType::class, $path);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();

            return $this->redirectToRoute('path_index');
        }


        return $this->render('path/edit.html.twig', [
            'form' => $form
        ]);
    }


    #[Route('/{id}/delete', name: 'path_delete')]
    public function delete(
        Path $path,
        EntityManagerInterface $entityManager
    ): Response {

        $entityManager->remove($path);
        $entityManager->flush();

        return $this->redirectToRoute('path_index');
    }
}