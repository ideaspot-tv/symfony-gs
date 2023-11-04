<?php

namespace App\Controller;

use App\Entity\Forecast;
use App\Entity\Location;
use App\Exception\LocationNotFoundException;
use App\Service\ForecastService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Context\Normalizer\ObjectNormalizerContextBuilder;

#[Route('/api/v1/weather')]
class WeatherApiController extends AbstractController
{
    #[Route('/forecast')]
    public function forecast(
        #[MapQueryParameter] string $name,
        #[MapQueryParameter] string $country,
        ForecastService $forecastService,
    ): JsonResponse
    {
        try {
            /** @var $location Location */
            /** @var $forecasts Forecast[] */
            list($location, $forecasts) = $forecastService->getForecastsForLocationName($country, $name);
        } catch (LocationNotFoundException $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'Location not found',
                ], Response::HTTP_FOUND
            );
        }

        $json = [
            'location_name' => $location->getName(),
            'location_country' => $location->getCountryCode(),
            'forecasts' => [],
        ];

        foreach ($forecasts as $forecast) {
            $row = [
                'date' => $forecast->getDate()->format('Y-m-d'),
                'temperature' => $forecast->getTemperatureCelsius(),
                'feels_like' => $forecast->getFlTemperatureCelsius(),
                'pressure' => $forecast->getPressure(),
                'humidity' => $forecast->getHumidity(),
                'wind_speed' => $forecast->getWindSpeed(),
                'wind_deg' => $forecast->getWindDeg(),
                'cloudiness' => $forecast->getCloudiness(),
                'icon' => $forecast->getIcon(),
            ];

            $json['forecasts'][$forecast->getDate()->format('Y-m-d')] = $row;
        }

        return new JsonResponse($json);

//        $context = (new ObjectNormalizerContextBuilder())
//            ->withGroups('api')
//            ->toArray();
//
//        return $this->json($forecasts, context: $context);
    }
}
