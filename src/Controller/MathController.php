<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Math;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MathController extends AbstractController
{
    #[Route('/math/add/{a}/{b}')]
    public function add(
        Math $math,
        $a,
        $b,
    ): Response
    {
        $sum = $math->add($a, $b);

        $response = new Response("<html><body><output>$sum</output></body>");

        return $response;
    }
}
