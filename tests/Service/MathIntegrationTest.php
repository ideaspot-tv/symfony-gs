<?php

namespace App\Tests\Service;

use App\Service\Math;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MathIntegrationTest extends KernelTestCase
{
    public function dataAdd(): array
    {
        $data = [
            [2, 2, 4],
            [0, 2, 2],
            [2, 0, 2],
        ];

        return $data;
    }


    /**
     * @dataProvider dataAdd
     */
    public function testAdd($a, $b, $expectedResult): void
    {
        $kernel = self::bootKernel();

        $container = static::getContainer();

        $math = $container->get(Math::class);

        $result = $math->add($a, $b);

        $this->assertEquals($expectedResult, $result);
    }
}
