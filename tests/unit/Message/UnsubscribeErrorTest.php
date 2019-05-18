<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\UnsubscribeError;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class UnsubscribeErrorTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new UnsubscribeError(Uri::notAuthorized(), RequestId::first());

        static::assertInstanceOf(UnsubscribeError::class, $instance);
    }
}