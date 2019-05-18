<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Subscribed;
use Krixon\Wamp\PubSub\SubscriptionId;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class SubscribedTest extends TestCase
{
    public function testConstruct() : void
    {
        $instance = new Subscribed(RequestId::first(), SubscriptionId::generate());

        static::assertInstanceOf(Subscribed::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(33, Subscribed::code());
    }
}