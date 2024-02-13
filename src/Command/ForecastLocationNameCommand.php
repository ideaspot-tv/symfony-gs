<?php

namespace App\Command;

use App\Repository\ForecastRepository;
use App\Repository\LocationRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'forecast:location-name',
    description: 'Get forecast for a given country code and location name.',
)]
class ForecastLocationNameCommand extends Command
{
    public function __construct(
        private LocationRepository $locationRepository,
        private ForecastRepository $forecastRepository,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('countryCode', InputArgument::REQUIRED, 'Country code of the location to check')
            ->addArgument('cityName', InputArgument::REQUIRED, 'City/location name to check the weather forecast for')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $countryCode = $input->getArgument('countryCode');
        $cityName = $input->getArgument('cityName');

        if ($io->isVeryVerbose()) {
            $io->writeln("Running command with {$cityName}, {$countryCode}");
        }

        $location = $this->locationRepository->findOneBy([
            'countryCode' => trim($countryCode),
            'name' => trim($cityName),
        ]);
        if (!$location) {
            throw new \Exception("Location not found");
        }

        $forecasts = $this->forecastRepository->findForForecast($location);

        $io->title("Forecast for $cityName, $countryCode");

        $forecastsArray = [];
        foreach ($forecasts as $forecast) {
            $forecastsArray[] = [
                $forecast->getDate()->format('Y-m-d'),
                $forecast->getTemperatureCelsius(),
                $forecast->getFlTemperatureCelsius(),
                $forecast->getPressure(),
                $forecast->getHumidity(),
                $forecast->getWindSpeed(),
                $forecast->getWindDeg(),
                $forecast->getCloudiness(),
                $forecast->getIcon(),
            ];
        }

        $io->horizontalTable([
            'Date',
            'Temperature',
            'Feels Like',
            'Pressure',
            'Humidity',
            'Wind Speed',
            'Wind Degree',
            'Cloudiness',
            'Icon',
        ], $forecastsArray);

        return Command::SUCCESS;
    }
}
