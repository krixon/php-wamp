<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\YieldMessage;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class YieldTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new YieldMessage(RequestId::first());

        static::assertInstanceOf(YieldMessage::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(70, YieldMessage::code());
    }
}