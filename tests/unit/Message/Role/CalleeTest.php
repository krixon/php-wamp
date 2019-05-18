<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message\Role;

use Krixon\Wamp\Message\Role\Callee;
use PHPUnit\Framework\TestCase;

class CalleeTest extends TestCase
{
    public function testExposesName() : void
    {
        static::assertSame('callee', Callee::name());
    }
}