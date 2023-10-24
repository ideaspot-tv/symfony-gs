<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\HighlanderApiDTO;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Highlander
{
    public function __construct(
        private ValidatorInterface $validator,
    )
    {
    }

    public function say(int $threshold = 50, int $trials = 1): array
    {
        $dto = new HighlanderApiDTO();
        $dto->threshold = $threshold;
        $dto->trials = $trials;

        $errors = $this->validator->validate($dto);
        if (count($errors)) {
            throw new \Exception((string) $errors);
        }

        $forecasts = [];
        for ($i = 0; $i < $trials; $i++) {
            $draw = random_int(0, 100);
            $forecast = $draw < $threshold ? "It's going to rain" : "It's going to be sunny";
            $forecasts[] = $forecast;
        }

        return $forecasts;
    }
}
