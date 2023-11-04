<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\LocationNotFoundException;
use App\Service\ForecastService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route("/weather/{countryCode}/{city}")]
    public function forecast(
        ForecastService $forecastService,
        string $countryCode,
        string $city,
    ): Response
    {
        try {
            list($location, $forecasts) = $forecastService->getForecastsForLocationName($countryCode, $city);
        } catch (LocationNotFoundException $e) {
            throw $this->createNotFoundException('Location not found');
        }

        $response = $this->render('weather/forecast.html.twig', [
            'forecasts' => $forecasts,
            'location' => $location,
        ]);

        return $response;
    }
}
