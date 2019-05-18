<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message\Role;

use Krixon\Wamp\Message\Role\Caller;
use PHPUnit\Framework\TestCase;

class CallerTest extends TestCase
{
    public function testExposesName() : void
    {
        static::assertSame('caller', Caller::name());
    }
}