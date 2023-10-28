<?php

namespace App\Form;

use App\Entity\Forecast;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForecastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('temperatureCelsius')
            ->add('flTemperatureCelsius')
            ->add('pressure')
            ->add('humidity')
            ->add('windSpeed')
            ->add('windDeg')
            ->add('cloudiness')
            ->add('icon')
            ->add('location')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forecast::class,
        ]);
    }
}
