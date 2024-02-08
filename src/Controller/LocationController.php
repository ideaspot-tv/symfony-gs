<?php

namespace App\Controller;

use App\Entity\Location;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/location-dummy')]
class LocationController extends AbstractController
{
    #[Route('/create')]
    public function create(EntityManagerInterface $entityManager): JsonResponse
    {
        $location = new Location();
        $location
            ->setName('Szczecin')
            ->setCountryCode('PL')
            ->setLatitude(53.4285)
            ->setLongitude(14.5528)
        ;

        $entityManager->persist($location);

        $entityManager->flush();

        return new JsonResponse([
            'id' => $location->getId(),
        ]);
    }
}
