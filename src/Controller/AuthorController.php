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

// Déclare une route de base pour toutes les méthodes de ce contrôleur : "/author"
// Le nom de route utilisé en préfixe est "author_"
#[Route('/author', name: 'author_')]
final class AuthorController extends AbstractController
{
    // Route pour afficher tous les auteurs : "/author/"
    // Nom de la route : "author_app_author"
    #[Route('/', name: 'app_author')]
    public function index(AuthorRepository $authorRepository): Response
    {
        // Récupère tous les auteurs en base
        $authors = $authorRepository->findAll();

        // Aucune URL de retour ici
        $baseUrl = false;

        // Génère l'URL pour accéder à la page d’ajout d’un auteur
        $urlToAdd = $this->generateUrl('author_author_add');

        // Rend la vue index avec les auteurs et les variables nécessaires à l'affichage
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors,
            'baseUrl' => $baseUrl,
            'urlToAdd' => $urlToAdd,
        ]);
    }

    // Route pour afficher uniquement les auteurs ayant plus d’un livre : "/author/multipleAuthors"
    // Nom de la route : "author_multiple_authors"
    #[Route('/multipleAuthors', name: 'multiple_authors')]
    public function multipleAuthors(AuthorRepository $authorRepository)
    {
        // Récupère les auteurs avec plus d’un livre (1 en paramètre)
        $authors = $authorRepository->getAuthorsWithMultipleBooks(1);

        // Lien de retour vers la route principale des auteurs
        $baseUrl = $this->generateUrl('author_app_author');

        // Pas de lien d’ajout dans cette vue
        $urlToAdd = false;

        // Rend la même vue que index, avec une liste filtrée
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
            'authors' => $authors,
            'baseUrl' => $baseUrl,
            'urlToAdd' => $urlToAdd,
        ]);
    }

    // Route pour ajouter un nouvel auteur : "/author/add"
    // Nom de la route : "author_author_add"
    #[Route('/add', name: 'author_add')]
    public function ajout(Request $request, ManagerRegistry $doctrine)
    {
        // Création d'un nouvel auteur vide
        $author = new Author();

        // Création du formulaire lié à l'auteur
        $form = $this->createForm(AuthorType::class, $author);

        // Traitement de la requête (remplit le formulaire avec les données POST si disponibles)
        $form->handleRequest($request);

        // Lien pour retourner à la liste des auteurs
        $baseUrl = $this->generateUrl('author_app_author');

        // Si le formulaire est soumis et valide, on sauvegarde l’auteur
        if ($form->isSubmitted() && $form->isValid()) {
            $author->setDateCreation(new \DateTime());

            $entityManager = $doctrine->getManager();
            $entityManager->persist($author);
            $entityManager->flush();

            // Redirection vers la liste des auteurs après l'ajout
            return $this->redirectToRoute('author_app_author');
        }

        // Affiche le formulaire d’ajout
        return $this->render('author/add_author.html.twig', [
            'formulaire_author' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }

    // Route pour modifier un auteur existant : "/author/edit/{id}"
    // Nom de la route : "author_edit"
    #[Route('/edit/{id}', name: 'edit')]
    public function edit(int $id, Request $request, ManagerRegistry $doctrine, AuthorRepository $authorRepository): Response
    {
        // Récupère l’auteur via son identifiant
        $author = $authorRepository->find($id);

        // Si l’auteur n’existe pas, on lève une erreur 404
        if (!$author) {
            throw $this->createNotFoundException('Auteur non trouvé');
        }

        // Création du formulaire de modification avec les données de l’auteur
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        // Lien pour revenir à la liste des auteurs
        $baseUrl = $this->generateUrl('author_app_author');

        // Si le formulaire est valide, on sauvegarde les modifications
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->flush();

            // Redirection après modification
            return $this->redirectToRoute('author_app_author');
        }

        // Affiche le formulaire de modification
        return $this->render('author/edit_author.html.twig', [
            'formulaire_author' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }

}

