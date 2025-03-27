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

    /*public function index(): Response
    {
        return $this->render('book_mark/index.html.twig', [
            'controller_name' => 'BookMarkController',
        ]);
    }*/

    /*
    #[Route("/add/static", name: "add_bookmark_static")]
    public function add_bookmark_static(EntityManagerInterface $entityManager): Response
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
        $entityManager->flush(); // Enregistre en base de données

        return $this->redirectToRoute('book_mark_app_book_mark'); // Redirection vers la liste des bookmarks
    }
    */


    #[Route('', name: 'app_book_mark')]
    public function index(BookMarkRepository $bookMarkRepository): Response
    {
        $bookmarks = $bookMarkRepository->findAll();
        return $this->render('book_mark/index.html.twig', [
            'controller_name' => 'BookMarkController',
            'bookmarks' => $bookmarks,
        ]);



    }

    /*
    #[Route("/add", name: "add_bookmark", methods: ['POST'])]
    public function add_bookmark(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Récupérer les données envoyées par le formulaire
        $url = $request->request->get('url');
        $commentaire = $request->request->get('commentaire');

        // Créer un nouvel objet BookMark avec les données du formulaire
        $bookmark = new BookMark();
        $bookmark->setUrl($url);
        $bookmark->setCommentaire($commentaire);
        $bookmark->setDateCreation(new \DateTime());

        // Persister l'objet en base de données
        $entityManager->persist($bookmark);
        $entityManager->flush();

        // Redirection vers la liste des bookmarks avec un message de succès
        return $this->redirectToRoute('book_mark_app_book_mark', [
            'success' => true,
        ]);
    }
    */


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
