<?php

namespace App\Controller;

use App\Repository\PresentationRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PresentationController extends AbstractController
{
    #[Route('/presentation', name: 'app_presentation')]
    public function index(PresentationRepository $pres, UtilisateurRepository $util): Response
    {
        $presentation = $pres->findAll();
        return $this->render('presentation/index.html.twig', [
            'presentation'=> $presentation
        ]);
    }
}
