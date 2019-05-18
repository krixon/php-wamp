<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Event;
use Krixon\Wamp\PubSub\PublicationId;
use Krixon\Wamp\PubSub\SubscriptionId;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    public static function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Event(SubscriptionId::generate(), PublicationId::generate());

        static::assertInstanceOf(Event::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(36, Event::code());
    }
}