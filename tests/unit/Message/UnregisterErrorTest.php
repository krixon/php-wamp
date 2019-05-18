<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\UnregisterError;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class UnregisterErrorTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new UnregisterError(Uri::notAuthorized(), RequestId::first());

        static::assertInstanceOf(UnregisterError::class, $instance);
    }
}