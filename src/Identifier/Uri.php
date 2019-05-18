<?php

declare(strict_types=1);

namespace Krixon\Wamp\Identifier;

use Krixon\Wamp\Error;

final class Uri
{
    private $value;


    private function __construct(string $value)
    {
        $this->value = $value;
    }


    /**
     * A Dealer or Broker could not determine if the Peer is authorized to perform a join, call, register, publish
     * or subscribe, since the authorization operation itself failed.
     */
    public static function authorizationFailed() : self
    {
        return self::error('authorization_failed');
    }


    /**
     * A Dealer or Callee canceled a call previously issued.
     */
    public static function cancelled() : self
    {
        return self::error('cancelled');
    }


    /**
     * The Peer is shutting down completely.
     */
    public static function closeRealm() : self
    {
        return self::close('close_realm');
    }


    public static function custom(string $value, bool $allowEmptyComponents = false) : self
    {
        $regex = $allowEmptyComponents
            ? '/^(([0-9a-z_]+\.)|\.)*([0-9a-z_]+)?$/'
            : '/^([0-9a-z_]+\.)*([0-9a-z_]+)$/';

        if (!preg_match($regex, $value)) {
            throw new Error(self::invalidUri());
        }

        return new self($value);
    }


    /**
     * A Peer acknowledges ending of a session.
     */
    public static function goodbyeAndOut() : self
    {
        return self::close('goodbye_and_out');
    }


    /**
     * A call failed since the given argument types or values are not acceptable to the called procedure.
     *
     * In this case the Callee may throw this error. Alternatively a Router may throw this error if it performed
     * payload validation of a call, call result, call error or publish, and the payload did not conform to
     * the requirements.
     */
    public static function invalidArgument() : self
    {
        return self::error('invalid_argument');
    }


    /**
     * Peer provided an incorrect URI for any URI-based attribute of WAMP message, such as realm, topic or procedure.
     */
    public static function invalidUri() : self
    {
        return self::error('invalid_uri');
    }


    /**
     * A Router encountered a network failure.
     */
    public static function networkFailure() : self
    {
        return self::error('network_failure');
    }


    /**
     * A Dealer could not perform a call, since a procedure with the given URI is registered, but Callee Blacklisting
     * and Whitelisting and/or Caller Exclusion lead to the exclusion of (any) Callee providing the procedure.
     */
    public static function noEligibleCallee() : self
    {
        return self::error('no_eligible_callee');
    }


    /**
     * A Dealer could not perform a call, since no procedure is currently registered under the given URI.
     */
    public static function noSuchProcedure() : self
    {
        return self::error('no_such_procedure');
    }


    /**
     * A Peer wanted to join a non-existing realm (and the Router did not allow the auto-creation of the realm).
     */
    public static function noSuchRealm() : self
    {
        return self::error('no_such_realm');
    }


    /**
     * A Dealer could not perform an unregister, since the given registration is not active.
     */
    public static function noSuchRegistration() : self
    {
        return self::error('no_such_registration');
    }


    /**
     * A Peer was to be authenticated under a Role that does not (or no longer) exists on the Router.
     *
     * For example, the Peer was successfully authenticated, but the Role configured does not exist - hence there
     * is some misconfiguration in the Router.
     */
    public static function noSuchRole() : self
    {
        return self::error('no_such_role');
    }


    /**
     * A Broker could not perform an unsubscribe, since the given subscription is not active.
     */
    public static function noSuchSubscription() : self
    {
        return self::error('no_such_subscription');
    }


    /**
     * A join, call, register, publish or subscribe failed, since the Peer is not authorized to perform the operation.
     */
    public static function notAuthorized() : self
    {
        return self::error('not_authorized');
    }


    /**
     * A Peer requested an interaction with an option that was disallowed by the Router.
     */
    public static function optionNotAllowed() : self
    {
        return self::error('option_not_allowed');
    }


    /**
     * A Router rejected client request to disclose its identity.
     */
    public static function optionDisallowedDiscloseMe() : self
    {
        return self::error('option_disallowed.disclose_me');
    }


    /**
     * A procedure could not be registered, since a procedure with the given URI is already registered.
     */
    public static function procedureAlreadyExists() : self
    {
        return self::error('procedure_already_exists');
    }


    /**
     * A Peer received invalid WAMP protocol message.
     */
    public static function protocolViolation() : self
    {
        return self::error('protocol_violation');
    }


    /**
     * The Peer is shutting down completely.
     */
    public static function systemShutdown() : self
    {
        return self::close('system_shutdown');
    }


    public function string() : string
    {
        return $this->value;
    }


    public function equals(self $other) : bool
    {
        return $other->value === $this->value;
    }


    private static function error(string $value) : self
    {
        return new self("wamp.error.$value");
    }


    private static function close(string $value) : self
    {
        return new self("wamp.close.$value");
    }
}