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
        $this->logger->debug("a+b");
        return $a + $b;
    }
}
