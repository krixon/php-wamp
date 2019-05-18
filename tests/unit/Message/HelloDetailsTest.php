<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Exception\RolesMustBeAnnounced;
use Krixon\Wamp\Message\HelloDetails;
use Krixon\Wamp\Message\Role\Publisher;
use Krixon\Wamp\Message\Role\Subscriber;
use PHPUnit\Framework\TestCase;

class HelloDetailsTest extends TestCase
{
    public function testThrowsIfNoRoleAnnounced() : void
    {
        $this->expectException(RolesMustBeAnnounced::class);

        HelloDetails::default();
    }


    public function testExtraRolesCanBeAnnounced() : void
    {
        $details = HelloDetails::default(new Subscriber());

        static::assertTrue($details->hasRoleAnnouncementNamed('subscriber'));
        static::assertFalse($details->hasRoleAnnouncementNamed('publisher'));

        $details = $details->withRoleAnnouncement(new Publisher());

        static::assertTrue($details->hasRoleAnnouncementNamed('publisher'));
    }


    public function testAgentCanBeAnnounced() : void
    {
        $details = HelloDetails::default(new Subscriber());

        static::assertEmpty($details->agent());

        $details = $details->withAgent('Test-Agent-1.0.0');

        static::assertSame('Test-Agent-1.0.0', $details->agent());
    }


    public function testAgentCanBeReAnnounced() : void
    {
        $details = HelloDetails::default(new Subscriber())->withAgent('Test-Agent-1.0.0');

        static::assertSame('Test-Agent-1.0.0', $details->agent());

        $details = $details->withAgent('Test-Agent-2.0.0');

        static::assertSame('Test-Agent-2.0.0', $details->agent());
    }


    public function testAnnouncingAgentIsIdempotent() : void
    {
        $details = HelloDetails::default(new Subscriber());

        for ($i = 0; $i < 3 ; $i++) {
            $details = $details->withAgent('Test-Agent-1.0.0');

            static::assertSame('Test-Agent-1.0.0', $details->agent());
        }
    }
}