<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\RegisterError;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class RegisterErrorTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new RegisterError(Uri::notAuthorized(), RequestId::first());

        static::assertInstanceOf(RegisterError::class, $instance);
    }
}