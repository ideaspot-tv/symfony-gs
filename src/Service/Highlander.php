<?php

declare(strict_types=1);

namespace App\Service;

class Highlander
{
    public function say(int $threshold = 50, int $trials = 1): array
    {
        $forecasts = [];
        for ($i = 0; $i < $trials; $i++) {
            $draw = random_int(0, 100);
            $forecast = $draw < $threshold ? "It's going to rain" : "It's going to be sunny";
            $forecasts[] = $forecast;
        }

        return $forecasts;
    }
}
