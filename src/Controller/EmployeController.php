<?php

namespace App\Controller;

use App\Entity\Employe;
use App\form\type\employeType;
use App\Repository\EmployeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

// Définition de la route principale pour le contrôleur Employe
#[Route('/employe', name: 'employe_')]
final class EmployeController extends AbstractController
{
    // Route pour afficher la liste des employés
    #[Route('/', name: 'index')]
    public function index(EmployeRepository $employeRepository): Response
    {
        $employes = $employeRepository->findAll();
        $baseUrl = false; // Variable pour l'URL de base
        $urlToAdd = $this->generateUrl('employe_add'); // Génération de l'URL pour ajouter un employé

        // Rendu de la vue avec les données nécessaires
        return $this->render('employe/index.html.twig', [
            'employes' => $employes,
            'baseUrl' => $baseUrl,
            'urlToAdd' => $urlToAdd,
        ]);
    }

    // Route pour ajouter un nouvel employé
    #[Route('/add', name: 'add')]
    public function add(Request $request, ManagerRegistry $doctrine): Response
    {
        $employe = new Employe(); // Création d'une nouvelle instance d'Employe
        $form = $this->createForm(EmployeType::class, $employe); // Création du formulaire
        $form->handleRequest($request); // Gestion de la requête

        $baseUrl = $this->generateUrl('employe_index'); // URL de retour à la liste des employés

        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarde de l'employé dans la base de données
            $entityManager = $doctrine->getManager();
            $entityManager->persist($employe);
            $entityManager->flush();

            // Redirection vers la liste des employés
            return $this->redirectToRoute('employe_index');
        }

        // Rendu de la vue pour ajouter un employé
        return $this->render('employe/add_employe.html.twig', [
            'formulaire_employe' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }

    // Route pour modifier un employé existant
    #[Route('/edit/{id}', name: 'edit')]
    public function edit(int $id, Request $request, ManagerRegistry $doctrine, EmployeRepository $employeRepository): Response
    {
        $employe = $employeRepository->find($id); // Recherche de l'employé par son ID

        if (!$employe) {
            // Exception si l'employé n'est pas trouvé
            throw $this->createNotFoundException('Employé non trouvé');
        }

        $form = $this->createForm(EmployeType::class, $employe); // Création du formulaire
        $form->handleRequest($request); // Gestion de la requête

        $baseUrl = $this->generateUrl('employe_index'); // URL de retour à la liste des employés

        if ($form->isSubmitted() && $form->isValid()) {
            // Mise à jour de l'employé dans la base de données
            $entityManager = $doctrine->getManager();
            $entityManager->flush();

            // Redirection vers la liste des employés
            return $this->redirectToRoute('employe_index');
        }

        // Rendu de la vue pour modifier un employé
        return $this->render('employe/edit_employe.html.twig', [
            'formulaire_employe' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }
}
