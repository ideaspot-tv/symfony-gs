<?php

namespace App\Controller;

use App\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/v1/weather')]
class WeatherApiController extends AbstractController
{
    #[Route('/json/{id}', name: 'app_weather_api')]
    public function jsonAction(Location $location): Response
    {
        $data = [
            'id' => $location->getId(),
            'name' => $location->getName(),
            'country' => $location->getCountryCode(),
        ];

        foreach ($location->getForecasts() as $forecast) {
            $data['forecasts'][$forecast->getDate()->format('Y-m-d')] = [
                'celsius' => $forecast->getCelsius(),
            ];
        }

//        return $this->json($data);
//        return new JsonResponse($data);
        $json = json_encode($data, JSON_PRETTY_PRINT);
        $response = new Response($json);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
