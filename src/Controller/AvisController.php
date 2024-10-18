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


        return $this->render('avis/index.html.twig', [
            'form' => $form->createView(),
            'AVV'=>$AVV,
        ]);
    }

    #[Route('/avis/{id}', name: 'avis.delete', methods: ['DELETE'])]
    public function delete(Avis $avis, EntityManagerInterface $manager, Request $request): Response
    {
    $data = json_decode($request->getContent(), true);
    if ($this->isCsrfTokenValid('delete' . $avis->getId(), $data['_token'])) {
        $manager->remove($avis);
        $manager->flush();

        $this->addFlash('success', 'Votre commentaire a bien été supprimé.');
        return new JsonResponse(['success' => true], 200);
    }
    
    return new JsonResponse(['error' => 'Token invalide'], 400);
    }

}
