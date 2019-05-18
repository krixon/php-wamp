<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Registered;
use Krixon\Wamp\Request\RequestId;
use Krixon\Wamp\Rpc\RegistrationId;
use PHPUnit\Framework\TestCase;

class RegisteredTest extends TestCase
{
    public function testConstruct() : void
    {
        $instance = new Registered(RequestId::first(), RegistrationId::generate());

        static::assertInstanceOf(Registered::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(33, Registered::code());
    }
}