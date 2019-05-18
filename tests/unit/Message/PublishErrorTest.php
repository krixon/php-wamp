<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\PublishError;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class PublishErrorTest extends TestCase
{
    public function testConstructWithOnlyRequiredArguments() : void
    {
        $instance = new PublishError(Uri::notAuthorized(), RequestId::first());

        static::assertInstanceOf(PublishError::class, $instance);
    }
}