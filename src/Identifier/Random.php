<?php

declare(strict_types=1);

namespace Krixon\Wamp\Identifier;

abstract class Random extends Numeric
{
    /**
     * @return static
     */
    public static function generate() : self
    {
        return new static(mt_rand(self::MIN_VALUE, self::MAX_VALUE));
    }
}