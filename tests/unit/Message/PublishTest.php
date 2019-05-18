<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\Publish;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class PublishTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Publish(RequestId::first(), Uri::protocolViolation());

        static::assertInstanceOf(Publish::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(16, Publish::code());
    }
}