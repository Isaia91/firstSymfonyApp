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

    /*public function index(): Response
    {
        return $this->render('book_mark/index.html.twig', [
            'controller_name' => 'BookMarkController',
        ]);
    }*/
    #[Route("/book/mark/add", name: "add_bookmark")]
    public function add_bookmark(EntityManagerInterface $entityManager): Response
    {
        // Les données à ajouter
        $data = [
            ['url' => 'https://symfony.com/', 'commentaire' => 'lien du site symfony'],
            ['url' => 'https://www.qwant.com/?l=fr', 'commentaire' => 'lien du site vers qwant'],
            ['url' => 'https://www.youtube.com/', 'commentaire' => 'lien du site youtube'],
        ];

        foreach ($data as $item) {
            $bookmark = new BookMark();
            $bookmark->setUrl($item['url']);
            $bookmark->setCommentaire($item['commentaire']);
            $bookmark->setDateCreation(new \DateTime());


            $entityManager->persist($bookmark);
        }


        //on ajoute lorsque que l'on accede a la page
        $entityManager->flush();

        //redirection vers la page des bookmarks
        return $this->redirectToRoute('app_book_mark');
    }


    #[Route('/book/mark', name: 'app_book_mark')]
    public function index(BookMarkRepository $bookMarkRepository): Response
    {
        $bookmarks = $bookMarkRepository->findAll();
        return $this->render('book_mark/index.html.twig', [
            'controller_name' => 'BookMarkController',
            'bookmarks' => $bookmarks,
        ]);

    }
}
