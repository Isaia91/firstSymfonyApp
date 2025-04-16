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

#[Route('/adresse', name: 'adresse_')]
final class AdresseController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(AdresseRepository $adresseRepository): Response
    {
        $adresses = $adresseRepository->findAll();
        $baseUrl = false;
        $urlToAdd = $this->generateUrl('adresse_add');

        return $this->render('adresse/index.html.twig', [
            'adresses' => $adresses,
            'baseUrl' => $baseUrl,
            'urlToAdd' => $urlToAdd,
        ]);
    }

    #[Route('/add', name: 'add')]
    public function add(Request $request, ManagerRegistry $doctrine): Response
    {
        $adresse = new Adresse();
        $form = $this->createForm(adresseType::class, $adresse);
        $form->handleRequest($request);

        $baseUrl = $this->generateUrl('adresse_index');

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($adresse);
            $entityManager->flush();

            return $this->redirectToRoute('adresse_index');
        }

        return $this->render('adresse/add_adresse.html.twig', [
            'formulaire_adresse' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(int $id, Request $request, ManagerRegistry $doctrine, AdresseRepository $adresseRepository): Response
    {
        $adresse = $adresseRepository->find($id);

        if (!$adresse) {
            throw $this->createNotFoundException('Adresse non trouvée');
        }

        $form = $this->createForm(adresseType::class, $adresse);
        $form->handleRequest($request);

        $baseUrl = $this->generateUrl('adresse_index');

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('adresse_index');
        }

        return $this->render('adresse/edit_adresse.html.twig', [
            'formulaire_adresse' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }
}
