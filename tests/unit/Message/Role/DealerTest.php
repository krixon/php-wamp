<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message\Role;

use Krixon\Wamp\Message\Role\Dealer;
use PHPUnit\Framework\TestCase;

class DealerTest extends TestCase
{
    public function testExposesName() : void
    {
        static::assertSame('dealer', Dealer::name());
    }
}