<?php

declare(strict_types=1);

namespace Krixon\Wamp\Identifier;

abstract class Sequential extends Numeric
{
    /**
     * @return static
     */
    public static function first() : self
    {
        return new static(self::MIN_VALUE);
    }


    /**
     * @return static
     */
    public function next() : self
    {
        return new static($this->integer() + 1);
    }
}