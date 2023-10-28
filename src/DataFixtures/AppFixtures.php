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
        $barcelona = $this->addLocation(
            $manager,
            'Barcelona',
            'ES',
            41.3874,
            2.1686
        );
        $this->addBarcelonaForecasts($manager, $barcelona);

        $berlin = $this->addLocation(
            $manager,
            'Berlin',
            'DE',
            52.5200,
            13.4050
        );
        $this->addBerlinForecasts($manager, $berlin);

        $stettin = $this->addLocation(
            $manager,
            'Stettin',
            'PL',
            53.4285,
            14.5528
        );
        $this->addStettinForecasts($manager, $stettin);

        $manager->flush();
    }

    private function addLocation(
        ObjectManager $manager,
        $name, $countryCode, $latitude, $longitude
    ): Location {
        $location = new Location();
        $location
            ->setName($name)
            ->setCountryCode($countryCode)
            ->setLatitude($latitude)
            ->setLongitude($longitude)
        ;
        $manager->persist($location);

        return $location;
    }

    private function addBarcelonaForecasts(ObjectManager $manager, Location $barcelona): void
    {
        $forecast = new Forecast();
        $forecast
            ->setDate(new \DateTime('2024-01-01'))
            ->setLocation($barcelona)
            ->setTemperatureCelsius(23)
            ->setFlTemperatureCelsius(25)
            ->setPressure(1009)
            ->setHumidity(49)
            ->setWindSpeed(7.7)
            ->setWindDeg(90)
            ->setCloudiness(0)
            ->setIcon('sun')
        ;
        $manager->persist($forecast);

        $forecast = new Forecast();
        $forecast
            ->setDate(new \DateTime('2024-01-02'))
            ->setLocation($barcelona)
            ->setTemperatureCelsius(20)
            ->setFlTemperatureCelsius(17)
            ->setPressure(999)
            ->setHumidity(70)
            ->setWindSpeed(3.2)
            ->setWindDeg(45)
            ->setCloudiness(75)
            ->setIcon('cloud')
        ;
        $manager->persist($forecast);

        $forecast = new Forecast();
        $forecast
            ->setDate(new \DateTime('2024-01-03'))
            ->setLocation($barcelona)
            ->setTemperatureCelsius(21)
            ->setFlTemperatureCelsius(22)
            ->setPressure(1025)
            ->setHumidity(40)
            ->setWindSpeed(0.7)
            ->setWindDeg(0)
            ->setCloudiness(25)
            ->setIcon('cloud-sun')
        ;
        $manager->persist($forecast);
    }

    private function addBerlinForecasts(ObjectManager $manager, Location $berlin): void
    {
        $forecast = new Forecast();
        $forecast
            ->setDate(new \DateTime('2024-01-01'))
            ->setLocation($berlin)
            ->setTemperatureCelsius(11)
            ->setFlTemperatureCelsius(9)
            ->setPressure(989)
            ->setHumidity(92)
            ->setWindSpeed(1)
            ->setWindDeg(180)
            ->setCloudiness(75)
            ->setIcon('cloud-rain')
        ;
        $manager->persist($forecast);

        $forecast = new Forecast();
        $forecast
            ->setDate(new \DateTime('2024-01-02'))
            ->setLocation($berlin)
            ->setTemperatureCelsius(10)
            ->setFlTemperatureCelsius(10)
            ->setPressure(1000)
            ->setHumidity(50)
            ->setWindSpeed(3.2)
            ->setWindDeg(90)
            ->setCloudiness(75)
            ->setIcon('cloud')
        ;
        $manager->persist($forecast);

        $forecast = new Forecast();
        $forecast
            ->setDate(new \DateTime('2024-01-03'))
            ->setLocation($berlin)
            ->setTemperatureCelsius(15)
            ->setFlTemperatureCelsius(15)
            ->setPressure(1025)
            ->setHumidity(40)
            ->setWindSpeed(0.7)
            ->setWindDeg(0)
            ->setCloudiness(25)
            ->setIcon('cloud-sun')
        ;
        $manager->persist($forecast);
    }

    private function addStettinForecasts(ObjectManager $manager, Location $stettin): void
    {
        $forecast = new Forecast();
        $forecast
            ->setDate(new \DateTime('2024-01-01'))
            ->setLocation($stettin)
            ->setTemperatureCelsius(11)
            ->setFlTemperatureCelsius(9)
            ->setPressure(989)
            ->setHumidity(92)
            ->setWindSpeed(1)
            ->setWindDeg(180)
            ->setCloudiness(75)
            ->setIcon('cloud-rain')
        ;
        $manager->persist($forecast);

        $forecast = new Forecast();
        $forecast
            ->setDate(new \DateTime('2024-01-02'))
            ->setLocation($stettin)
            ->setTemperatureCelsius(10)
            ->setFlTemperatureCelsius(10)
            ->setPressure(1000)
            ->setHumidity(50)
            ->setWindSpeed(3.2)
            ->setWindDeg(90)
            ->setCloudiness(75)
            ->setIcon('cloud')
        ;
        $manager->persist($forecast);

        $forecast = new Forecast();
        $forecast
            ->setDate(new \DateTime('2024-01-03'))
            ->setLocation($stettin)
            ->setTemperatureCelsius(15)
            ->setFlTemperatureCelsius(15)
            ->setPressure(1025)
            ->setHumidity(40)
            ->setWindSpeed(0.7)
            ->setWindDeg(0)
            ->setCloudiness(25)
            ->setIcon('cloud-sun')
        ;
        $manager->persist($forecast);
    }
}
