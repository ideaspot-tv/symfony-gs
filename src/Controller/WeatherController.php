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
                "date" => new \DateTime('2024-01-01'),
                "temperatureCelsius" => 17,
                "flTemperatureCelsius" => 16,
                "pressure" => 1000,
                "humidity" => 64,
                "wind_speed" => 3.2,
                "wind_deg" => 270,
                "cloudiness" => 75,
                'icon' => 'sun',
            ],
            [
                "date" => new \DateTime('2024-01-02'),
                "temperatureCelsius" => 12,
                "flTemperatureCelsius" => 13,
                "pressure" => 1001,
                "humidity" => 62,
                "wind_speed" => 2.2,
                "wind_deg" => 180,
                "cloudiness" => 50,
                'icon' => 'cloud',
            ],
            [
                "date" => new \DateTime('2024-01-03'),
                "temperatureCelsius" => 11,
                "flTemperatureCelsius" => 12,
                "pressure" => 1010,
                "humidity" => 63,
                "wind_speed" => 3.5,
                "wind_deg" => 270,
                "cloudiness" => 15,
                'icon' => 'cloud-rain',
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
