<?php

namespace App\Tests\Service;

use App\Service\Math;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class MathTest extends TestCase
{
    public function dataAdd(): array
    {
        $data = [
            '2+2=4' => [2, 2, 4],
            '0+2=2' => [0, 2, 2],
            '2+0=2' => [2, 0, 2],
            '0+0=0' => [0, 0, 0],
            '-2+2=0' => [-2, 2, 0],
            '-2-2=-4' => [-2, -2, -4],
        ];

        return $data;
    }

    /**
     * @dataProvider dataAdd
     */
    public function testAdd($a, $b, $expectedResult): void
    {
        $mockLogger = $this->createMock(LoggerInterface::class);
        $math = new Math($mockLogger);
        $result = $math->add($a, $b);

        $this->assertEquals($expectedResult, $result, "$a+$b should equal $expectedResult on Math::add()");
    }
}
