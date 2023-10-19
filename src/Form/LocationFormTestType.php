<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationFormTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
                    'min' => -90,
                    'max' => 90,
                ]
            ])
            ->add('longitude', NumberType::class, [
                'html5' => true,
                'scale' => 7,
                'attr' => [
                    'min' => -90,
                    'max' => 90,
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
