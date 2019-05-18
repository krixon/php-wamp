<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Unregistered;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class UnregisteredTest extends TestCase
{
    public function testConstruct() : void
    {
        $instance = new Unregistered(RequestId::first());

        static::assertInstanceOf(Unregistered::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(67, Unregistered::code());
    }
}