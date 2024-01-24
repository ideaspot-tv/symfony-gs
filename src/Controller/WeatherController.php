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
                'date' => '2024-01-23',
                'temperature' => '-4',
                'feels_like' => '2',
                'pressure' => 1000,
                'humidity' => '20%',
                'wind' => '3.5 m/s',
                'cloudiness' => '75%',
                'icon' => 'snow',
            ],
            [
                'date' => '2024-01-24',
                'temperature' => '3',
                'feels_like' => '2',
                'pressure' => 9000,
                'humidity' => '70%',
                'wind' => '1.1 m/s',
                'cloudiness' => '25%',
                'icon' => 'sun',
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
