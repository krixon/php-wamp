<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Identifier;

use Krixon\Wamp\Identifier\Numeric;
use PHPUnit\Framework\TestCase;
use RangeException;

class NumericTest extends TestCase
{
    public function testThrowsWhenMinimumValueNotMet() : void
    {
        $this->expectException(RangeException::class);

        $this->instance(0);
    }


    public function testThrowsWhenMaximumValueExceeded() : void
    {
        $this->expectException(RangeException::class);

        $this->instance((2**53) + 1);
    }


    private function instance(int $value = 1) : Numeric
    {
        return new class($value) extends Numeric
        {
            public function __construct(int $value)
            {
                parent::__construct($value);
            }
        };
    }
}