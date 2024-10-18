<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AjoutAvisController extends AbstractController
{
    #[Route('/ajoutavis', name: 'app_ajout_avis')]
    #[IsGranted('ROLE_USER')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $avis->setNumUser($this->getUser()); 
            $entityManager->persist($avis);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_confirmation_a');
        }
    
        return $this->render('ajout_avis/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}
