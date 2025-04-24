<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\form\type\adresseType;
use App\Repository\AdresseRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

// Définition de la route principale pour le contrôleur Adresse
#[Route('/adresse', name: 'adresse_')]
final class AdresseController extends AbstractController
{
    // Action pour afficher la liste des adresses
    #[Route('/', name: 'index')]
    public function index(AdresseRepository $adresseRepository): Response
    {
        $adresses = $adresseRepository->findAll(); // Récupération de toutes les adresses
        $baseUrl = false; // Variable pour l'URL de base
        $urlToAdd = $this->generateUrl('adresse_add'); // Génération de l'URL pour ajouter une adresse

        return $this->render('adresse/index.html.twig', [
            'adresses' => $adresses,
            'baseUrl' => $baseUrl,
            'urlToAdd' => $urlToAdd,
        ]);
    }

    // Action pour ajouter une nouvelle adresse
    #[Route('/add', name: 'add')]
    public function add(Request $request, ManagerRegistry $doctrine): Response
    {
        $adresse = new Adresse(); // Création d'une nouvelle entité Adresse
        $form = $this->createForm(adresseType::class, $adresse); // Création du formulaire
        $form->handleRequest($request); // Gestion de la requête

        $baseUrl = $this->generateUrl('adresse_index'); // URL de retour à la liste des adresses

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($adresse); // Sauvegarde de l'adresse
            $entityManager->flush();

            return $this->redirectToRoute('adresse_index'); // Redirection vers la liste
        }

        return $this->render('adresse/add_adresse.html.twig', [
            'formulaire_adresse' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }

    // Action pour modifier une adresse existante
    #[Route('/edit/{id}', name: 'edit')]
    public function edit(int $id, Request $request, ManagerRegistry $doctrine, AdresseRepository $adresseRepository): Response
    {
        $adresse = $adresseRepository->find($id); // Recherche de l'adresse par son ID

        if (!$adresse) {
            throw $this->createNotFoundException('Adresse non trouvée'); // Gestion de l'erreur si l'adresse n'existe pas
        }

        $form = $this->createForm(adresseType::class, $adresse); // Création du formulaire pour l'édition
        $form->handleRequest($request);

        $baseUrl = $this->generateUrl('adresse_index'); // URL de retour à la liste des adresses

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->flush(); // Mise à jour de l'adresse

            return $this->redirectToRoute('adresse_index'); // Redirection vers la liste
        }

        return $this->render('adresse/edit_adresse.html.twig', [
            'formulaire_adresse' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }
}