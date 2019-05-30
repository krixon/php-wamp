<?php

declare(strict_types=1);

namespace Krixon\Wamp\Session;

use Krixon\StateMachine\Exception\InvalidTransitionException;
use Krixon\Wamp\Session\Exception\InvalidState;
use SplObjectStorage;
use function sprintf;

abstract class Session
{
    private $id;
    private $state;
    /** @var Observer[]|SplObjectStorage */
    private $observers;


    public function __construct(SessionId $id)
    {
        $this->id        = $id;
        $this->state     = new State();
        $this->observers = new SplObjectStorage();
    }


    abstract public function write(string $data) : void;


    public function __toString() : string
    {
        return sprintf('Session %s [%s]', $this->id, $this->state);
    }


    public function id() : SessionId
    {
        return $this->id;
    }


    public function isEstablishing() : bool
    {
        return $this->state->isEstablishing();
    }


    public function isEstablished() : bool
    {
        return $this->state->isEstablished();
    }


    public function isFailed() : bool
    {
        return $this->state->isFailed();
    }


    public function isShuttingDown() : bool
    {
        return $this->state->isShuttingDown();
    }


    public function isClosing() : bool
    {
        return $this->state->isClosing();
    }


    public function isClosed() : bool
    {
        return $this->state->isClosed();
    }


    public function attach(Observer $observer) : void
    {
        $this->observers->attach($observer);
    }


    public function start() : void
    {
        $this->transition(State::ESTABLISHING);
    }


    public function establish() : void
    {
        $this->transition(State::ESTABLISHED);
    }


    final protected function notifyDataReceived(string $data) : void
    {
        foreach ($this->observers as $observer) {
            $observer->onSessionDataReceived($this, $data);
        }
    }


    private function transition(string $state) : void
    {
        try {
            $this->state->transition($state);
        } catch (InvalidTransitionException $exception) {
            throw new Exception\InvalidState(sprintf(
                'Session cannot transition from state %s to %s.',
                $this->state->get(),
                $state
            ));
        }
    }
}