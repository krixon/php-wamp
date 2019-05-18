<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Welcome;
use Krixon\Wamp\Message\Role\Broker;
use Krixon\Wamp\Message\WelcomeDetails;
use Krixon\Wamp\Session\SessionId;
use PHPUnit\Framework\TestCase;

class WelcomeTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Welcome(
            SessionId::generate(),
            WelcomeDetails::default(new Broker())
        );

        static::assertInstanceOf(Welcome::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(2, Welcome::code());
    }
}