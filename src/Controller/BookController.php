<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/book', name: 'book_')]
final class BookController extends AbstractController
{
    #[Route('', name: 'app_book')]
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();
        $baseUrl = false;
        $bookCount = $bookRepository->countBook();
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
            'books' => $books,
            'countBook' => $bookCount,
            'baseUrl' => $baseUrl,
        ]);
    }

    #[Route('/authorsWithMultipleBooks/{firstLetter}', name: 'getAuthorsWithMultipleBooks')]
        public function getAuthorsWithMultipleBooks(BookRepository $bookRepository, string $firstLetter){
        if ($firstLetter) {
            $books = $bookRepository->findByFirstLetter($firstLetter);
            $baseUrl = $this->generateUrl('book_app_book');
            $bookCount = count($books);
            if ($books) {
                return $this->render('book/index.html.twig', [
                    'controller_name' => 'BookController',
                    'books' => $books,
                    'countBook' => $bookCount,
                    'baseUrl' => $baseUrl,
                ]);
            }
        }
        else{
            return $this->redirectToRoute('book_app_book');
        }


    }
}
