<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[Route('/weather')]
class WeatherController extends AbstractController
{
    #[Route('/highlander-says/{threshold<\d+>?50}', host: 'api.localhost')]
    public function highlanderSaysApi(int $threshold): Response
    {
        $draw = random_int(0, 100);

        $forecast = $draw < $threshold ? "It's going to rain" : "It's going to be sunny";

        $json = [
            'forecast' => $forecast,
            'self' => $this->generateUrl(
                'app_weather_highlandersaysapi',
                ['threshold' => $threshold],
                UrlGeneratorInterface::ABSOLUTE_URL
            ),
        ];

        return new JsonResponse($json);
    }

    #[Route('/highlander-says/{threshold<\d+>?50}')]
    public function highlanderSays(int $threshold): Response
    {
        // draw an integer from 0 to 100
        $draw = random_int(0, 100);

        // if the value is < 50 (%) then say it's gonna rain
        // otherwise say it's gonna be sunny
        $forecast = $draw < $threshold ? "It's going to rain" : "It's going to be sunny";

        // return response
        return $this->render('weather/highlander_says.html.twig', [
            'forecast' => $forecast,
        ]);
    }

    #[Route('/highlander-says/{guess}')]
    public function highlanderSaysGuess(string $guess): Response
    {
        $availableGuesses = ['snow', 'rain', 'hail'];

        if (!in_array($guess, $availableGuesses)) {
            // throw $this->createNotFoundException('This guess is not found');
//            throw new NotFoundHttpException('This guess is not found (manually)');
//            throw new BadRequestHttpException('Bad request');
            throw new \Exception("Base exception");
        }

        $forecast = "It's going to $guess";

        return $this->render('weather/highlander_says.html.twig', [
            'forecast' => $forecast,
        ]);
    }
}
