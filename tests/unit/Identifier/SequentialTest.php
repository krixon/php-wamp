<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Identifier;

use Krixon\Wamp\Identifier\Sequential;
use PHPUnit\Framework\TestCase;
use RangeException;

class SequentialTest extends TestCase
{
    public function testNextIncrementsByOne() : void
    {
        $first = $this->instance();

        static::assertSame(1, $first->integer());
        static::assertSame(2, $first->next()->integer());
        static::assertSame(3, $first->next()->next()->integer());
        static::assertSame(4, $first->next()->next()->next()->integer());
        static::assertSame(5, $first->next()->next()->next()->next()->integer());
    }


    public function testThrowsWhenMaximumValueExceeded() : void
    {
        $last = $this->instance(2**53);

        $this->expectException(RangeException::class);

        $last->next();
    }


    private function instance(int $value = 1) : Sequential
    {
        return new class($value) extends Sequential
        {
            public function __construct(int $value)
            {
                parent::__construct($value);
            }
        };
    }
}