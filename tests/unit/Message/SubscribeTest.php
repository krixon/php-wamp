<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\Subscribe;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class SubscribeTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Subscribe(RequestId::first(), Uri::protocolViolation());

        static::assertInstanceOf(Subscribe::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(32, Subscribe::code());
    }
}