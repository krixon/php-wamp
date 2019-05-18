<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Result;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class ResultTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new Result(RequestId::first());

        static::assertInstanceOf(Result::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(50, Result::code());
    }
}