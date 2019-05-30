<?php

declare(strict_types=1);

namespace Krixon\Wamp\Identifier;

use RangeException;

abstract class Numeric
{
    protected const MIN_VALUE = 1;
    protected const MAX_VALUE = 2**53;

    private $value;


    protected function __construct(int $id)
    {
        if ($id < self::MIN_VALUE || $id > self::MAX_VALUE) {
            throw new RangeException(sprintf(
                'Identifier %d is invalid. Valid range is %d-%d, inclusive.',
                $id,
                self::MAX_VALUE,
                self::MAX_VALUE
            ));
        }


        $this->value = $id;
    }


    public function __toString() : string
    {
        return (string) $this->value;
    }


    public function integer() : int
    {
        return $this->value;
    }
}