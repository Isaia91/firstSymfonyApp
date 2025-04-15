<?php

namespace App\Controller;

use App\Entity\Author;
use App\form\type\authorType;
use App\Repository\AuthorRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/author', name: 'author_')]
final class AuthorController extends AbstractController
{
    #[Route('/', name: 'app_author')]
    public function index(AuthorRepository $authorRepository): Response
    {
        $authors = $authorRepository->findAll();
        $baseUrl = false;
        $urlToAdd = $this->generateUrl('author_author_add');
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors,
            'baseUrl' => $baseUrl,
            'urlToAdd' => $urlToAdd,
        ]);
    }

    #[Route('/multipleAuthors', name: 'multiple_authors')]
    public function multipleAuthors(AuthorRepository $authorRepository)
    {
        $authors = $authorRepository->getAuthorsWithMultipleBooks(1);
        $baseUrl = $this->generateUrl('author_app_author');

        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors,
            'baseUrl' => $baseUrl,
        ]);
    }

    #[Route('/add', name: 'author_add')]
    public function ajout(Request $request, ManagerRegistry $doctrine)
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);
        $baseUrl = $this->generateUrl('author_app_author');

        if ($form->isSubmitted() && $form->isValid()) {
            $author->setDateCreation(new \DateTime());

            $entityManager = $doctrine->getManager();
            $entityManager->persist($author);
            $entityManager->flush();

            return $this->redirectToRoute('author_app_author');
        }

        return $this->render('author/add_author.html.twig', [
            'formulaire_author' => $form,
            'baseUrl'=>$baseUrl,
        ]);
    }


    #[Route('/edit/{id}', name: 'edit')]
    public function edit(int $id, Request $request, ManagerRegistry $doctrine, AuthorRepository $authorRepository): Response
    {
        $author = $authorRepository->find($id);

        if (!$author) {
            throw $this->createNotFoundException('Auteur non trouvé');
        }

        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);
        $baseUrl = $this->generateUrl('author_app_author');

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('author_app_author');
        }

        return $this->render('author/edit_author.html.twig', [
            'formulaire_author' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }

}
