<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\SubscribeError;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class SubscribeErrorTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new SubscribeError(Uri::notAuthorized(), RequestId::first());

        static::assertInstanceOf(SubscribeError::class, $instance);
    }
}