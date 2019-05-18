<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Unsubscribe;
use Krixon\Wamp\PubSub\SubscriptionId;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class UnsubscribeTest extends TestCase
{
    public function testConstruct() : void
    {
        $instance = new Unsubscribe(RequestId::first(), SubscriptionId::generate());

        static::assertInstanceOf(Unsubscribe::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(34, Unsubscribe::code());
    }
}