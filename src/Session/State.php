<?php

declare(strict_types=1);

namespace Krixon\Wamp\Session;

use Krixon\StateMachine\MappedState;

class State extends MappedState
{
    public const ESTABLISHING  = 'ESTABLISHING';
    public const ESTABLISHED   = 'ESTABLISHED';
    public const FAILED        = 'FAILED';
    public const SHUTTING_DOWN = 'SHUTTING_DOWN';
    public const CLOSING       = 'CLOSING';
    public const CLOSED        = 'CLOSED';

    private const TRANSITIONS = [
        self::CLOSING => [
            self::CLOSED,        // Sent acknowledgement GOODBYE (Router + Client).
        ],
        self::CLOSED => [
            self::ESTABLISHING,  // Received HELLO (Router) / Sent HELLO (Client).
        ],
        self::ESTABLISHING => [
            self::CLOSED,        // Received invalid HELLO (Router) / Sent ABORT (Router + Client).
            self::ESTABLISHED,   // Sent WELCOME (Router) / Received WELCOME (Client).
            self::FAILED,        // Received other.
        ],
        self::ESTABLISHED => [
            self::CLOSING,       // Received GOODBYE (Router + Client).
            self::SHUTTING_DOWN, // Sent initial GOODBYE (Router + Client).
        ],
        self::SHUTTING_DOWN => [
            self::CLOSED,        // Received acknowledgement GOODBYE (Router + Client).
        ],
    ];


    public function __toString() : string
    {
        return $this->currentState;
    }


    public function isEstablishing() : bool
    {
        return $this->is(self::ESTABLISHING);
    }


    public function isEstablished() : bool
    {
        return $this->is(self::ESTABLISHED);
    }


    public function isFailed() : bool
    {
        return $this->is(self::FAILED);
    }


    public function isShuttingDown() : bool
    {
        return $this->is(self::SHUTTING_DOWN);
    }


    public function isClosing() : bool
    {
        return $this->is(self::CLOSING);
    }


    public function isClosed() : bool
    {
        return $this->is(self::CLOSED);
    }


    protected function validTransitionMap() : array
    {
        return self::TRANSITIONS;
    }


    protected function initialState() : string
    {
        return self::CLOSED;
    }
}