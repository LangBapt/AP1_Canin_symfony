<?php

namespace App\Controller;

use App\Repository\PresentationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Presentation;
use App\Form\PresentationType;
use Doctrine\ORM\EntityManagerInterface;

class PresentationController extends AbstractController
{
    #[Route('/presentation', name: 'presentation')]
    public function index(PresentationRepository $pres, Request $request): Response
    {

        $presentations = $pres->findAll();
        // Affichage du formulaire avec d'éventuelles erreurs
        return $this->render('presentation/index.html.twig', [ 
            'presentations'=> $presentations
        ]);
    }

    #[Route('/presentation/update/{id}', name: 'presentation_update', methods: ['POST'])]
    public function update(Request $request, EntityManagerInterface $entityManager, $id, PresentationRepository $pres): Response
    {
    // Récupérer la prestation par ID
    $presentation = $pres->find($id);

    if ($presentation) {
        // Récupérer les données depuis la requête
        $titre = $request->request->get('titre');
        $texte = $request->request->get('texte');

        // Vérifier que les données ne sont pas nulles
        if ($titre && $texte) {
            $presentation->setTitrePresentation($titre);
            $presentation->setTextePresentation($texte);

            // Sauvegarder les changements
            $entityManager->persist($presentation);
            $entityManager->flush();

            // Rediriger vers la page de prestations après la modification
            return $this->redirectToRoute('presentation');
        }
    }
    }
}