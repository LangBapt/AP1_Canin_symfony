<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();

        // Création du formulaire
        $form = $this->createForm(ContactType::class, $contact);

        // Gestion de la soumission du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Si le formulaire est valide, enregistrement dans la base de données
            $entityManager->persist($contact);
            $entityManager->flush();

            // Message flash de succès
            $this->addFlash('success', 'Votre message a été envoyé avec succès !');

            // Redirection après soumission
            return $this->redirectToRoute('app_contact');
        }
        // Affichage du formulaire avec d'éventuelles erreurs
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
            
        ]);
    }
}
