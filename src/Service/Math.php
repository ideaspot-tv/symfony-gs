<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;

class Math
{
    public function __construct(
        private LoggerInterface $logger
    )
    {
    }


    public function add($a, $b)
    {
        $this->logger->debug("Math::add() was called with $a and $b");
        return $a + $b;
    }
}
