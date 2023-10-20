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
        $location->setLatitude(0);
        $location->setLongitude(0);


        $form = $this->createForm(LocationFormTestType::class, $location, [
            'validation_groups' => ['new'],
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repository->save($location, true);

            return $this->redirectToRoute('app_locationform_edit', [
                'id' => $location->getId(),
            ]);
        }

        return $this->render('location_form/new.html.twig', [
            'form' => $form,
        ]);
    }
    #[Route('/edit/{id}')]
    public function edit(
        Request $request,
        Location $location,
        LocationRepository $repository,
    ): Response
    {
        $form = $this->createForm(LocationFormTestType::class, $location, [
            'validation_groups' => ['edit']
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $repository->save($location, true);

            return $this->redirectToRoute('app_locationform_edit', [
                'id' => $location->getId(),
            ]);
        }

        return $this->render('location_form/edit.html.twig', [
            'form' => $form,
        ]);
    }
}
