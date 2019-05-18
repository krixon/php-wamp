<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\CallError;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class CallErrorTest extends TestCase
{
    public static function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new CallError(Uri::notAuthorized(), RequestId::first());

        static::assertInstanceOf(CallError::class, $instance);
    }


    public static function testReturnsCode() : void
    {
        static::assertSame(8, CallError::code());
    }


    public static function testReturnsMessageCode() : void
    {
        $instance = new CallError(Uri::notAuthorized(), RequestId::first());

        static::assertSame(48, $instance->messageCode());
    }
}