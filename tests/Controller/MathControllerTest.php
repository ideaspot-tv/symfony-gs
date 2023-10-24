<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MathControllerTest extends WebTestCase
{
    public function dataAdd(): array
    {
        $data = [
            [2, 2, 4],
            [0, 0, 0],
            [2, 0, 2],
            [0, 2, 2],
        ];

        return $data;
    }

    /**
     * @dataProvider dataAdd
     */
    public function testAdd($a, $b, $expectedResult): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', "/math/add/$a/$b");

        $this->assertResponseIsSuccessful();

        $output = $crawler->filter('output');
        $outputValue = $output->eq(0)->text();

        $this->assertEquals($expectedResult, $outputValue);
    }
}
