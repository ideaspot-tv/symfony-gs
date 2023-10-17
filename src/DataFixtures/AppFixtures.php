<?php

namespace App\DataFixtures;

use App\Entity\Forecast;
use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $location = $this->addLocation('Barcelona', 'ES', 41.38879, 2.15899);
        $manager->persist($location);

        $forecast = $this->addForecast($location, '2024-01-01', 21);
        $manager->persist($forecast);
        $forecast = $this->addForecast($location, '2024-01-02', 22);
        $manager->persist($forecast);
        $forecast = $this->addForecast($location, '2024-01-03', 23);
        $manager->persist($forecast);
        $forecast = $this->addForecast($location, '2024-01-04', 24);
        $manager->persist($forecast);

        $location = $this->addLocation('Berlin', 'DE', 52.5200, 13.4050);
        $manager->persist($location);

        $location = $this->addLocation('Paris', 'FR', 48.8566, 2.3522);
        $manager->persist($location);

        $location = $this->addLocation('Warsaw', 'PL', 52.2297, 21.0122);
        $manager->persist($location);

        $location = $this->addLocation('Delhi', 'IN', 28.7041, 77.1025);
        $manager->persist($location);

        $manager->flush();
    }

    private function addLocation(
        string $name,
        string $code,
        float $latitude,
        float $longitude
    ): Location
    {
        $location = new Location();
        $location
            ->setName($name)
            ->setCountryCode($code)
            ->setLatitude($latitude)
            ->setLongitude($longitude)
        ;

        return $location;
    }

    private function addForecast(
        Location $location,
        string $dateString,
        int $celsius,
    ): Forecast
    {
        $forecast = new Forecast();
        $forecast
            ->setLocation($location)
            ->setDate(new \DateTime($dateString))
            ->setCelsius($celsius)
        ;

        return $forecast;
    }
}
