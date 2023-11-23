<?php

namespace App\Tests\Entity;

use App\Entity\Forecast;
use PHPUnit\Framework\TestCase;

class ForecastTest extends TestCase
{
    public function dataTemperatureFahrenheit(): array
    {
        $data = [
            [0, 32],
            [1, 34],
            [-1, 30],
            [50, 122],
            [-50, -58],
        ];

        return $data;
    }

    /**
     * @dataProvider dataTemperatureFahrenheit
     */
    public function testTemperatureFahrenheit($celsius, $expectedFahrenheit): void
    {
        $forecast = new Forecast();
        $forecast->setTemperatureCelsius($celsius);
        $fahrenheit = $forecast->getTemperatureFahrenheit();

        $this->assertEquals($expectedFahrenheit, $fahrenheit, "Wrong Celsius to Fahrenheit conversion");
    }
}
