<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Identifier;

use Krixon\Wamp\Identifier\Uri;
use PHPUnit\Framework\TestCase;

class UriTest extends TestCase
{
    public static function testAuthorizationFailed() : void
    {
        static::assertSame('wamp.error.authorization_failed', Uri::authorizationFailed()->string());
    }


    public static function testCancelled() : void
    {
        static::assertSame('wamp.error.cancelled', Uri::cancelled()->string());
    }


    public static function testCloseRealm() : void
    {
        static::assertSame('wamp.close.close_realm', Uri::closeRealm()->string());
    }


    public static function testGoodbyeAndOut() : void
    {
        static::assertSame('wamp.close.goodbye_and_out', Uri::goodbyeAndOut()->string());
    }


    public static function testInvalidArgument() : void
    {
        static::assertSame('wamp.error.invalid_argument', Uri::invalidArgument()->string());
    }


    public static function testInvalidUri() : void
    {
        static::assertSame('wamp.error.invalid_uri', Uri::invalidUri()->string());
    }


    public static function testNetworkFailure() : void
    {
        static::assertSame('wamp.error.network_failure', Uri::networkFailure()->string());
    }


    public static function testNoEligibleCallee() : void
    {
        static::assertSame('wamp.error.no_eligible_callee', Uri::noEligibleCallee()->string());
    }


    public static function testNoSuchProcedure() : void
    {
        static::assertSame('wamp.error.no_such_procedure', Uri::noSuchProcedure()->string());
    }


    public static function testNoSuchRealm() : void
    {
        static::assertSame('wamp.error.no_such_realm', Uri::noSuchRealm()->string());
    }


    public static function testNoSuchRegistration() : void
    {
        static::assertSame('wamp.error.no_such_registration', Uri::noSuchRegistration()->string());
    }


    public static function testNoSuchRole() : void
    {
        static::assertSame('wamp.error.no_such_role', Uri::noSuchRole()->string());
    }


    public static function testNoSuchSubscription() : void
    {
        static::assertSame('wamp.error.no_such_subscription', Uri::noSuchSubscription()->string());
    }


    public static function testNotAuthorized() : void
    {
        static::assertSame('wamp.error.not_authorized', Uri::notAuthorized()->string());
    }


    public static function testOptionNotAllowed() : void
    {
        static::assertSame('wamp.error.option_not_allowed', Uri::optionNotAllowed()->string());
    }


    public static function testOptionDisallowedDiscloseMed() : void
    {
        static::assertSame('wamp.error.option_disallowed.disclose_me', Uri::optionDisallowedDiscloseMe()->string());
    }


    public static function testProcedureAlreadyExists() : void
    {
        static::assertSame('wamp.error.procedure_already_exists', Uri::procedureAlreadyExists()->string());
    }


    public static function testProtocolViolation() : void
    {
        static::assertSame('wamp.error.protocol_violation', Uri::protocolViolation()->string());
    }


    public static function testSystemShutdown() : void
    {
        static::assertSame('wamp.close.system_shutdown', Uri::systemShutdown()->string());
    }
}