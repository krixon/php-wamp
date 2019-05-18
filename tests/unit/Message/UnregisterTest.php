<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Unregister;
use Krixon\Wamp\Request\RequestId;
use Krixon\Wamp\Rpc\RegistrationId;
use PHPUnit\Framework\TestCase;

class UnregisterTest extends TestCase
{
    public function testConstruct() : void
    {
        $instance = new Unregister(RequestId::first(), RegistrationId::generate());

        static::assertInstanceOf(Unregister::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(66, Unregister::code());
    }
}