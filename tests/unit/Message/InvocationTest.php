<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Invocation;
use Krixon\Wamp\Request\RequestId;
use Krixon\Wamp\Rpc\RegistrationId;
use PHPUnit\Framework\TestCase;

class InvocationTest extends TestCase
{
    public function testConstruct() : void
    {
        $instance = new Invocation(RequestId::first(), RegistrationId::generate());

        static::assertInstanceOf(Invocation::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(68, Invocation::code());
    }
}