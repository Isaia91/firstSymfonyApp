<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
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
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors,
            'baseUrl' => $baseUrl,
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
}
