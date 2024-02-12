<?php

namespace App\Controller;

use App\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/location-form')]
class LocationFormController extends AbstractController
{
    #[Route('/new')]
    public function new(): Response
    {
        $location = new Location();
        $location->setCountryCode('PL');

        $form = $this->createFormBuilder($location)
            ->add('name', TextareaType::class)
            ->add('countryCode')
            ->add('latitude')
            ->add('longitude')
            ->getForm();

        return $this->render('location_form/new.html.twig', [
            'form' => $form,
        ]);
    }
}
