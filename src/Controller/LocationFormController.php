<?php

namespace App\Controller;

use App\Entity\Location;
use App\Form\LocationFormTestType;
use App\Repository\LocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/location-form')]
class LocationFormController extends AbstractController
{
    #[Route('/new')]
    public function new(
        Request $request,
        LocationRepository $repository,
    ): Response
    {
        $location = new Location();

        $form = $this->createForm(LocationFormTestType::class, $location);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repository->save($location, true);

            return $this->redirectToRoute('app_location_index');
        }

        return $this->render('location_form/new.html.twig', [
            'form' => $form,
        ]);
    }
}
