<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController
{
    #[Route("/weather/{countryCode}/{city}")]
    public function forecast(string $countryCode, string $city): Response
    {
        $content = "<html><body>$countryCode: $city</body></html>";

        return new Response($content);
    }
}
