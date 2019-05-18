<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message\Role;

use Krixon\Wamp\Message\Role\Subscriber;
use PHPUnit\Framework\TestCase;

class SubscriberTest extends TestCase
{
    public function testExposesName() : void
    {
        static::assertSame('subscriber', Subscriber::name());
    }
}