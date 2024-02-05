<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
//    #[Route('/weather/highlander-says/{threshold}', name: 'this_is_my_name', methods: ['GET', 'POST'])]
    public function highlanderSays(int $threshold): Response
    {
        // draw an integer from 0 to 100
        $draw = random_int(0, 100);

        // if the value is < 50 (%) then say it's gonna rain
        // otherwise say it's gonna be sunny
        $forecast = $draw < 50 ? "It's going to rain" : "It's going to be sunny";

        // return response
        return $this->render('weather/highlander_says.html.twig', [
            'forecast' => $forecast,
        ]);
    }
}
