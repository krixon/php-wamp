<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\Hello;
use Krixon\Wamp\Message\HelloDetails;
use Krixon\Wamp\Message\Role\Subscriber;
use PHPUnit\Framework\TestCase;

class HelloTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Hello(
            Uri::custom('com.example.realm.foo'),
            HelloDetails::default(new Subscriber())
        );

        static::assertInstanceOf(Hello::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(1, Hello::code());
    }
}
