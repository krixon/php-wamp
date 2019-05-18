<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Exception\RolesMustBeAnnounced;
use Krixon\Wamp\Message\Role\Broker;
use Krixon\Wamp\Message\Role\Dealer;
use Krixon\Wamp\Message\WelcomeDetails;
use PHPUnit\Framework\TestCase;

class WelcomeDetailsTest extends TestCase
{
    public function testThrowsIfNoRoleAnnounced() : void
    {
        $this->expectException(RolesMustBeAnnounced::class);

        WelcomeDetails::default();
    }


    public function testExtraRolesCanBeAnnounced() : void
    {
        $details = WelcomeDetails::default(new Broker());

        static::assertTrue($details->hasRoleAnnouncementNamed('broker'));
        static::assertFalse($details->hasRoleAnnouncementNamed('dealer'));

        $details = $details->withRoleAnnouncement(new Dealer());

        static::assertTrue($details->hasRoleAnnouncementNamed('dealer'));
    }
}