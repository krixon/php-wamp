<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\Call;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class CallTest extends TestCase
{
    public static function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Call(RequestId::first(), Uri::custom('com.example.procedure.foo'));

        static::assertInstanceOf(Call::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(48, Call::code());
    }


    public static function testProvidesProcedure() : void
    {
        $procedure = Uri::custom('com.example.procedure.foo');
        $instance  = new Call(RequestId::first(), $procedure);

        static::assertTrue($instance->procedure()->equals($procedure));
    }
}