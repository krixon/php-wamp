<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Unsubscribed;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class UnsubscribedTest extends TestCase
{
    public function testConstruct() : void
    {
        $instance = new Unsubscribed(RequestId::first());

        static::assertInstanceOf(Unsubscribed::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(35, Unsubscribed::code());
    }
}