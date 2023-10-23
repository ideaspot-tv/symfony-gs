<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\HighlanderApiDTO;
use App\Service\Highlander;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

#[Route('/{_locale}/weather', requirements: [
    '_locale' => 'en|de'
])]
class WeatherController extends AbstractController
{
    #[Route('/highlander-says/api')]
    public function highlanderSaysApi(
        Highlander $highlander,
        #[MapQueryString] ?HighlanderApiDTO $dto = null,
    ): Response
    {
        if (!$dto) {
            $dto = new HighlanderApiDTO();
            $dto->threshold = 50;
            $dto->trials = 1;
        }

        $forecasts = $highlander->say($dto->threshold, $dto->trials);
        $json = [
            'forecasts' => $forecasts,
            'threshold' => $dto->threshold,
        ];

        return new JsonResponse($json);
        return $this->json($json);
    }

    #[Route('/highlander-says/{threshold<\d+>}')]
    public function highlanderSays(
        Request $request,
        RequestStack $requestStack,
        TranslatorInterface $translator,
        Highlander $highlander,
        ?int $threshold = null,
        #[MapQueryParameter] ?string $_format = 'html'
    ): Response
    {
        $session = $requestStack->getSession();
        if ($threshold) {
            $session->set('threshold', $threshold);
            $this->addFlash(
                'info',
                $translator->trans('weather.highlander_says.success', [
                    '%threshold%' => $threshold,
                ])
            );
        } else {
            $threshold = $session->get('threshold', 50);
        }
        $trials = (int) $request->get('trials', 1);

        $forecasts = $highlander->say($threshold, $trials);

        $html = $this->renderView("weather/highlander_says.{$_format}.twig", [
            'forecasts' => $forecasts,
            'threshold' => $threshold,
        ]);
        $response = new Response($html);

        return $response;
    }

    #[Route('/highlander-says/{guess}')]
    public function highlanderSaysGuess(string $guess): Response
    {
        $availableGuesses = ['snow', 'rain', 'hail'];

        if (!in_array($guess, $availableGuesses)) {
            throw $this->createNotFoundException('This guess is not found');
//            throw new NotFoundHttpException('This guess is not found (manually)');
//            throw new BadRequestHttpException('Bad request');
//            throw new \Exception("Base exception");
        }

        $forecast = "It's going to $guess";

        return $this->render('weather/highlander_says.html.twig', [
            'forecasts' => [$forecast],
        ]);
    }
}
