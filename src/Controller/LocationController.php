<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\LocationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/location-dummy')]
class LocationController extends AbstractController
{
    #[Route('/create')]
    public function create(LocationRepository $locationRepository): JsonResponse
    {
        $location = new Location();
        $location
            ->setName('Szczecin')
            ->setCountryCode('PL')
            ->setLatitude(53.4285)
            ->setLongitude(14.5528)
        ;

        $locationRepository->save($location, true);

        return new JsonResponse([
            'id' => $location->getId(),
        ]);
    }


    #[Route('/edit')]
    public function edit(
        LocationRepository $locationRepository,
    ): JsonResponse
    {
        $location = $locationRepository->find(7);
        $location->setName('Stettin');

        $locationRepository->save($location, true);

        return new JsonResponse([
            'id' => $location->getId(),
            'name' => $location->getName(),
        ]);
    }

    #[Route('/remove/{id}')]
    public function remove(
        LocationRepository $locationRepository,
        int $id,
    ): JsonResponse
    {
        $location = $locationRepository->find($id);
        $locationRepository->remove($location, flush: true);

        return new JsonResponse(null);
    }
}
