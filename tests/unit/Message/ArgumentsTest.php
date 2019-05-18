<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Arguments;
use PHPUnit\Framework\TestCase;

class ArgumentsTest extends TestCase
{
    public static function testConstructWithNeither() : void
    {
        $instance = new Arguments();

        static::assertInstanceOf(Arguments::class, $instance);
    }


    public static function testConstructWithStaticFactoryNone() : void
    {
        $instance = Arguments::none();

        static::assertEmpty($instance->positional());
        static::assertEmpty($instance->keyword());
    }


    public static function testConstructWithOnlyPositional() : void
    {
        $instance = new Arguments([1, 2, 3]);

        static::assertInstanceOf(Arguments::class, $instance);
    }


    public static function testConstructWithOnlyKeyword() : void
    {
        $instance = new Arguments([], ['foo' => 1, 'bar' => 2]);

        static::assertInstanceOf(Arguments::class, $instance);
    }


    public static function testConstructWithPositionalAndKeyword() : void
    {
        $instance = new Arguments([1, 2, 3], ['foo' => 1, 'bar' => 2]);

        static::assertInstanceOf(Arguments::class, $instance);
    }


    public static function testEnsuresPositionalArgumentsAreNumericallyIndexed() : void
    {
        $instance = new Arguments(['foo' => 1, 'bar' => 2]);

        static::assertSame([0 => 1, 1 => 2], $instance->positional());
    }


    public static function testEnsuresPositionalArgumentsHaveNoGapsInIndex() : void
    {
        $instance = new Arguments([0 => 'foo', 42 => 'bar', 43 => 'baz']);

        static::assertSame([0 => 'foo', 1 => 'bar', 2 => 'baz'], $instance->positional());
    }
}