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
    // Affiche la liste des bookmarks
    #[Route('', name: 'app_book_mark')]
    public function index(BookMarkRepository $bookMarkRepository): Response
    {
        $bookmarks = $bookMarkRepository->findAll();
        $baseUrl  = $this->generateUrl('book_mark_app_book_mark');
        return $this->render('book_mark/index.html.twig', [
            'controller_name' => 'BookMarkController',
            'bookmarks' => $bookmarks,
            'baseUrl' => $baseUrl,
        ]);
    }

    // Affiche le détail d'un bookmark spécifique
    #[Route('/{id}', name: "detail", requirements: ["id" => "\d+"])]
    public function detail_bookmark(int $id, BookMarkRepository $bookMarkRepository): Response
    {
        $bookmark = $bookMarkRepository->find($id);

        return $this->render('book_mark/detail.html.twig', [
            'bookmark' => $bookmark,
        ]);
    }

    // Ajoute un nouveau bookmark
    #[Route('/add', name: 'app_book_mark_add')]
    public function ajout(Request $request, ManagerRegistry $doctrine)
    {
        $bookmark = new bookmark();
        $form = $this->createForm(bookmarkType::class, $bookmark);
        $form->handleRequest($request);
        $baseUrl = $this->generateUrl('book_mark_app_book_mark');

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Définit la date de création
            $bookmark->setDateCreation(new \DateTime());

            $entityManager = $doctrine->getManager();
            $entityManager->persist($bookmark);
            $entityManager->flush();

            return $this->redirectToRoute('book_mark_app_book_mark');
        }

        return $this->render('book_mark/add_bookmark.html.twig', [
            'formulaire_book_mark' => $form,
            'baseUrl' => $baseUrl,
            'action' => 'add',
        ]);
    }

    // Modifie un bookmark existant
    #[Route('/edit/{id}', name: 'edit')]
    public function edit(int $id, Request $request, ManagerRegistry $doctrine, BookMarkRepository $bookMarkRepository): Response
    {
        $bookmark = $bookMarkRepository->find($id);

        if (!$bookmark) {
            throw $this->createNotFoundException('Bookmark non trouvé');
        }

        $form = $this->createForm(bookmarkType::class, $bookmark);
        $form->handleRequest($request);
        $baseUrl = $this->generateUrl('book_mark_app_book_mark');
        $action = "edit";

        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine->getManager()->flush();
            return $this->redirectToRoute('book_mark_app_book_mark');
        }

        return $this->render('book_mark/add_bookmark.html.twig', [
            'formulaire_book_mark' => $form,
            'baseUrl' => $baseUrl,
            'action' => $action,
        ]);
    }
}
