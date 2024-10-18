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
use Symfony\Component\Security\Http\Attribute\IsGranted;


class AvisController extends AbstractController
{
    #[Route('/avis', name: 'avis')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = new Avis();
        $form = $this->createForm(FormulaireAvisType::class, $avis);
        $form->handleRequest($request);

        $AvisRepository = $entityManager->getRepository(Avis::class);
        $AVV = $AvisRepository->findAll();

        return $this->render('avis/index.html.twig', [
            'form' => $form->createView(),
            'AVV' => $AVV,
        ]);
    }

    // Route pour supprimer un avis (seulement l'auteur ou un admin peut supprimer)
    #[Route('/avis/{id}', name: 'avis.delete')]
    #[IsGranted('ROLE_USER')]
    public function delete(Avis $avis, EntityManagerInterface $manager, Request $request, int $id): Response
    {
        if ($this->isCsrfTokenValid('delete' . $avis->getId(), $request->request->get('_token'))) {
            if ($this->isGranted('ROLE_ADMIN') || $avis->getNumUser() === $this->getUser()) {
                $manager->remove($avis);
                $manager->flush();
                return $this->redirectToRoute('avis');
            } else {
                $this->addFlash('error', 'Vous n\'avez pas les droits pour supprimer cet avis.');
            }
        }

        return $this->redirectToRoute('avis');
    }
}
