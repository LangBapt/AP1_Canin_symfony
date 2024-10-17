<?php

namespace App\Controller;

use App\Entity\Prestation;
use App\Repository\PrestationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use App\Form\PrestationType;

class PrestationController extends AbstractController
{
    #[Route('/prestations', name: 'prestations')]
    public function index(PrestationRepository $prestationRepository): Response
    {
        $prestations = $prestationRepository->findAll();

        return $this->render('prestation/index.html.twig', [
            'prestations' => $prestations,
        ]);
    }


    #[Route('/prestations/update/{id}', name: 'prestations_update', methods: ['POST'])]
    public function update(Request $request, EntityManagerInterface $entityManager, $id, PrestationRepository $prestationRepository): Response
    {
        // Récupérer la prestation par ID
        $prestation = $prestationRepository->find($id);

        if ($prestation) {
            // Récupérer les données depuis la requête
            $nom = $request->request->get('nom');
            $prix = $request->request->get('prix');
            $descriptif = $request->request->get('descriptif');

            // Vérifier que les données ne sont pas nulles
            if ($nom && $prix && $descriptif) {
                $prestation->setTitrePresta($nom);
                $prestation->setPrixHorairePresta((float)$prix);  // Conversion en float pour le prix
                $prestation->setTextePresta($descriptif);

                // Sauvegarder les changements
                $entityManager->persist($prestation);
                $entityManager->flush();

                // Rediriger vers la page de prestations après la modification
                return $this->redirectToRoute('prestations');
            }
        }

        // Rediriger si la prestation n'existe pas ou si les données sont invalides
        return $this->redirectToRoute('prestations');
    }


    #[Route('/delete/{id}', name: 'prestations_delete', methods: ['POST'])]
    public function delete(Request $request, PrestationRepository $prestationRepository, EntityManagerInterface $entityManager, $id, CsrfTokenManagerInterface $csrfTokenManager): Response
    {
        // Récupérer la prestation en question
        $prestation = $prestationRepository->find($id);

        if ($prestation) {
            // Supprimer la prestation
            $entityManager->remove($prestation);
            $entityManager->flush();

            // Ajouter un message flash pour informer l'utilisateur
            $this->addFlash('success', 'La prestation a bien été supprimée.');
        }

        // Rediriger vers la liste des prestations
        return $this->redirectToRoute('prestations');
    }

    #[Route('/add', name: 'prestations_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créer une nouvelle instance de la Prestation
        $prestation = new Prestation();

        // Créer le formulaire
        $form = $this->createForm(PrestationType::class, $prestation);

        // Traiter la requête HTTP
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Persister la nouvelle prestation en base de données
            $entityManager->persist($prestation);
            $entityManager->flush();

            // Ajouter un message flash pour indiquer que la prestation a été ajoutée
            $this->addFlash('success', 'La prestation a bien été ajoutée.');

            // Rediriger vers la liste des prestations
            return $this->redirectToRoute('prestations');
        }

        // Rendre le formulaire à la vue
        return $this->render('prestation/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
