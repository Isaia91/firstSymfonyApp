<?php

namespace App\Controller;

use App\Repository\BookMarkRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\BookMark;
use Doctrine\ORM\EntityManagerInterface;
use App\form\type\bookmarkType;


#[Route('/book/mark', name: 'book_mark_')]
final class BookMarkController extends AbstractController
{

    #[Route('', name: 'app_book_mark')]
    public function index(BookMarkRepository $bookMarkRepository): Response
    {
        $bookmarks = $bookMarkRepository->findAll();
        return $this->render('book_mark/index.html.twig', [
            'controller_name' => 'BookMarkController',
            'bookmarks' => $bookmarks,
        ]);



    }

    #[Route('/{id}',  name: "detail", requirements: ["id" => "\d+"])]
    public function detail_bookmark(int $id, BookMarkRepository $bookMarkRepository): Response
    {
        $bookmark = $bookMarkRepository->find($id);



        return $this->render('book_mark/detail.html.twig', [
            'bookmark' => $bookmark,
        ]);

    }

    #[Route('/add', name: 'app_book_mark_add')]
    public function ajout(Request $request, ManagerRegistry $doctrine)
    {
        // Création d’un objet que l'on assignera au formulaire
        $bookmark = new bookmark();
        $form = $this->createForm(bookmarkType::class, $bookmark);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            //date de creation
            $bookmark->setDateCreation(new \DateTime());

            $entityManager = $doctrine->getManager();
            $entityManager->persist($bookmark);
            $entityManager->flush();

            return $this->redirectToRoute('app_book_mark');
        }
            return $this->render('book_mark/add_bookmark.html.twig'
            , [
                'formulaire_book_mark' => $form,
            ]);
    }



}
