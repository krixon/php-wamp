<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\InvocationError;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class InvocationErrorTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new InvocationError(Uri::notAuthorized(), RequestId::first());

        static::assertInstanceOf(InvocationError::class, $instance);
    }
}