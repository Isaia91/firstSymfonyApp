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

#[Route('/employe', name: 'employe_')]
final class EmployeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EmployeRepository $employeRepository): Response
    {
        $employes = $employeRepository->findAll();
        $baseUrl = false;
        $urlToAdd = $this->generateUrl('employe_add');

        return $this->render('employe/index.html.twig', [
            'employes' => $employes,
            'baseUrl' => $baseUrl,
            'urlToAdd' => $urlToAdd,
        ]);
    }

    #[Route('/add', name: 'add')]
    public function add(Request $request, ManagerRegistry $doctrine): Response
    {
        $employe = new Employe();
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        $baseUrl = $this->generateUrl('employe_index');

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($employe);
            $entityManager->flush();

            return $this->redirectToRoute('employe_index');
        }

        return $this->render('employe/add_employe.html.twig', [
            'formulaire_employe' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(int $id, Request $request, ManagerRegistry $doctrine, EmployeRepository $employeRepository): Response
    {
        $employe = $employeRepository->find($id);

        if (!$employe) {
            throw $this->createNotFoundException('Employé non trouvé');
        }

        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        $baseUrl = $this->generateUrl('employe_index');

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('employe_index');
        }

        return $this->render('employe/edit_employe.html.twig', [
            'formulaire_employe' => $form,
            'baseUrl' => $baseUrl,
        ]);
    }
}
