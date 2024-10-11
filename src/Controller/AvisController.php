<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\FormulaireAvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AvisController extends AbstractController
{
    #[Route('/avis', name: 'avis')]
    #[Security('ROLE_USER')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {


        $avis= new Avis();
        $form=$this->createForm(FormulaireAvisType::class, $avis);
        $form->handleRequest($request);

        $AvisRepository=$entityManager->getRepository(Avis::class);
        $AVV=$AvisRepository->findAll();

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($avis);

            $entityManager->flush();

            return $this->render('avis/confirmation.html.twig');
        }

        return $this->render('avis/index.html.twig', [
            'form' => $form->createView(),
            'AVV'=>$AVV,
        ]);
    }
}
