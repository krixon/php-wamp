<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\Register;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class RegisterTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Register(RequestId::first(), Uri::custom('com.example.procedure.foo'));

        static::assertInstanceOf(Register::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(64, Register::code());
    }
}