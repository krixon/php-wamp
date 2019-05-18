<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message\Role;

use Krixon\Wamp\Message\Role\Publisher;
use PHPUnit\Framework\TestCase;

class PublisherTest extends TestCase
{
    public function testExposesName() : void
    {
        static::assertSame('publisher', Publisher::name());
    }
}