<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\FormulaireAvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

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


        return $this->render('avis/index.html.twig', [
            'form' => $form->createView(),
            'AVV'=>$AVV,
        ]);
    }

    #[Route('/avis/{id}', name: 'avis.delete')]
    public function delete(Avis $avis, EntityManagerInterface $manager, Request $request, int $id): Response
    {
        $data = json_decode($request->getContent(), true);
        $repository = $manager->getRepository(Avis::class);
        $avis = $repository->find($id);

        if ($avis) { 
            $manager->remove($avis);
            $manager->flush();


            return $this->redirectToRoute('avis');
            
        }

    }
}

