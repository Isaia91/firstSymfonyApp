<?php

namespace App\Controller;

use App\Repository\BookMarkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\BookMark;
use Doctrine\ORM\EntityManagerInterface;

final class BookMarkController extends AbstractController
{
    #[Route('/book/mark', name: 'app_book_mark')]
    /*public function index(): Response
    {
        return $this->render('book_mark/index.html.twig', [
            'controller_name' => 'BookMarkController',
        ]);
    }*/

    public function index(BookMarkRepository $bookMarkRepository): Response
    {
        $bookmarks = $bookMarkRepository->findAll();
        return $this->render('book_mark/index.html.twig', [
            'controller_name' => 'BookMarkController',
            'bookmarks' => $bookmarks,
        ]);

    }
}
