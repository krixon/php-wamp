<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\Abort;
use PHPUnit\Framework\TestCase;

class AbortTest extends TestCase
{
    public static function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Abort(Uri::protocolViolation());

        static::assertInstanceOf(Abort::class, $instance);
    }


    public static function testReturnsCode() : void
    {
        static::assertSame(3, Abort::code());
    }


    public static function testReturnsReason() : void
    {
        static::assertEquals(
            Uri::protocolViolation(),
            (new Abort(Uri::protocolViolation()))->reason()
        );
    }
}