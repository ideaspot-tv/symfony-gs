<?php

namespace App\Controller;

use App\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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

        $form = $this->createFormBuilder($location)
            ->add('name', TextType::class)
            ->add('countryCode', ChoiceType::class, [
                'choices' => [
                    '' => null,
                    'Poland' => 'PL',
                    'Germany' => 'DE',
                    'France' => 'FR',
                    'India' => 'IN',
                    'United Kingdom' => 'UK',
                    'United States' => 'US',
                ]
            ])
            ->add('latitude', NumberType::class, [
                'html5' => true,
                'scale' => 7,
                'attr' => [
                    'step' => 0.1,
                    'min' => -90,
                    'max' => 90,
                ]
            ])
            ->add('longitude', NumberType::class, [
                'html5' => true,
                'scale' => 7,
                'attr' => [
                    'step' => 0.1,
                    'min' => -90,
                    'max' => 90,
                ]
            ])
            ->getForm();

        return $this->render('location_form/new.html.twig', [
            'form' => $form,
        ]);
    }
}
