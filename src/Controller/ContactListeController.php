<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ContactRepository;

class ContactListeController extends AbstractController
{
    #[Route('/contact/liste', name: 'app_contact_liste')]
    public function index(ContactRepository $contact): Response
    {
        $contacts = $contact->findAll();
        return $this->render('contact_liste/index.html.twig', [
            'contacts'=> $contacts
        ]);
    }
}
