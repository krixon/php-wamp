<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\Goodbye;
use PHPUnit\Framework\TestCase;

class GoodbyeTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Goodbye(Uri::systemShutdown());

        static::assertInstanceOf(Goodbye::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(6, Goodbye::code());
    }
}