<?php

declare(strict_types=1);

namespace Krixon\Wamp;

use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

trait LoggerAware
{
    use LoggerAwareTrait;


    private function logger() : LoggerInterface
    {
        if (!$this->logger) {
            $this->logger = new NullLogger();
        }

        return $this->logger;
    }
}