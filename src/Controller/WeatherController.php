<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route("/weather/{countryCode}/{city}")]
    public function forecast(string $countryCode, string $city): Response
    {
        $forecasts = [
            [
                'Date' => '2024-01-23',
                'Temperature' => '-4',
                'Feels Like' => '2',
                'Pressure' => 1000,
                'Humidity' => '20%',
                'Wind' => '3.5 m/s',
                'Cloudiness' => '75%',
                'Icon' => 'snow',
            ],
            [
                'Date' => '2024-01-24',
                'Temperature' => '3',
                'Feels Like' => '2',
                'Pressure' => 9000,
                'Humidity' => '70%',
                'Wind' => '1.1 m/s',
                'Cloudiness' => '25%',
                'Icon' => 'sun',
            ],
        ];

        $response = $this->render('weather/forecast.html.twig', [
            'forecasts' => $forecasts,
            'city' => $city,
            'countryCode' => $countryCode,
        ]);

        return $response;
    }
}
