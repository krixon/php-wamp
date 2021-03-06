<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message\Role;

use Krixon\Wamp\Message\Role\Broker;
use PHPUnit\Framework\TestCase;

class BrokerTest extends TestCase
{
    public function testExposesName() : void
    {
        static::assertSame('broker', Broker::name());
    }
}