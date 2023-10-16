<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\LocationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

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


    #[Route('/edit')]
    public function edit(
        LocationRepository $locationRepository,
        EntityManagerInterface $entityManager,
    ): JsonResponse
    {
        $location = $locationRepository->find(6);
        $location->setName('Stettin');

        $entityManager->flush();

        return new JsonResponse([
            'id' => $location->getId(),
            'name' => $location->getName(),
        ]);
    }
}
