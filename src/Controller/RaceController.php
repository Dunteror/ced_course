<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Race;
use App\Form\RaceType;

class RaceController extends AbstractController
{
    /**
     * @Route("/race", name="race")
     */
    public function list(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Race::class);
        $races = $repository->findByStrength(50);

        return $this->render('base.html.twig', array(
            'races' => $races,
        ));
    }

    /**
     * @Route("/race/new", name="race_new")
     */
    public function new(Request $request): Response
    {
        $form = $this->createForm(RaceType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $race = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($race);
            $entityManager->flush();

            return $this->redirectToRoute('race');
        }

        return $this->render('newRace.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
