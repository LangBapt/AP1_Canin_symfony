<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ConfirmationAController extends AbstractController
{
    #[Route('/confirmation/a', name: 'app_confirmation_a')]
    public function index(): Response
    {
        return $this->render('confirmation_a/index.html.twig', [
            'controller_name' => 'ConfirmationAController',
        ]);
    }
}
