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
    #[Route('/ajout/avis', name: 'app_ajout_avis')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {


        $avis= new Avis();
        $form=$this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);

        $AvisRepository=$entityManager->getRepository(Avis::class);
        $AVV=$AvisRepository->findAll();



        return $this->render('ajout_avis/index.html.twig', [
            'form' => $form->createView(),
            'AVV'=>$AVV,
        ]);
    }
}
