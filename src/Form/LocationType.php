<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('countryCode', ChoiceType::class, [
                'choices'  => [
                    '(choose)' => null,
                    'Poland' => 'PL',
                    'Germany' => 'DE',
                    'Spain' => 'ES',
                    'France' => 'FR',
                    'United States' => 'US',
                    'Portugal' => 'PT',
                ],
            ])
            ->add('latitude')
            ->add('longitude')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
