<?php

namespace App\Controller;

use App\Entity\Book;
use App\form\type\bookType;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/book', name: 'book_')]
final class BookController extends AbstractController
{
    #[Route('', name: 'app_book')]
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();
        $baseUrl = $this->generateUrl('book_app_book');
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

    #[Route('/add', name: 'app_book_add')]
    public function ajout(Request $request, ManagerRegistry $doctrine)
    {
        $baseUrl = $this->generateUrl('book_app_book');
        // Création d’un objet que l'on assignera au formulaire
        $book = new book();
        $form = $this->createForm(bookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            //date de creation
            $book->setDateCreation(new \DateTime());

            $entityManager = $doctrine->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('book_app_book');
        }
        return $this->render('book/add_book.html.twig'
            , [
                'baseUrl' => $baseUrl,
                'formulaire_book' => $form,
            ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(int $id, Request $request, ManagerRegistry $doctrine, BookRepository $bookRepository): Response
    {
        $book = $bookRepository->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Livre non trouvé');
        }

        $form = $this->createForm(bookType::class, $book);
        $form->handleRequest($request);
        $baseUrl = $this->generateUrl('book_app_book');

        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine->getManager()->flush();
            return $this->redirectToRoute('book_app_book');
        }

        return $this->render('book/add_book.html.twig', [
            'formulaire_book' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }

}
