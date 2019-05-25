<?php

declare(strict_types=1);

namespace Krixon\Wamp\Peer;

use Krixon\Wamp\Message\Message;
use Krixon\Wamp\Message\Welcome;
use Krixon\Wamp\Message\WelcomeDetails;
use Krixon\Wamp\Session\Observer;
use Krixon\Wamp\Session\Session;
use Krixon\Wamp\Session\SessionId;
use function print_r;
use function printf;
use SplObjectStorage;
use function sprintf;

class Router implements Observer
{
    /** @var Session[]|SplObjectStorage */
    private $sessions;
    private $broker;
    private $dealer;


    public function __construct(?Broker $broker, ?Dealer $dealer)
    {
        // FIXME: Assert at least one of dealer or broker was provided.
        $this->broker    = $broker;
        $this->dealer    = $dealer;
        $this->sessions  = new SplObjectStorage();
    }


    public function onSessionDataReceived(Session $session, string $data)
    {
        // Deserialize the data into a Message object.
        // Route the message to the Dealer or Broker peer.
        // If necessary pass back a promise for the result?
        printf("Rx: %d: %s\n", $session->id()->integer(), trim($data));

        $this->send($session->id(), new Welcome($session->id(), WelcomeDetails::default(new \Krixon\Wamp\Message\Role\Dealer())));
    }


    public function generateSessionId() : SessionId
    {
        do {
            $sessionId = SessionId::generate();
        } while ($this->sessions->contains($sessionId));

        return $sessionId;
    }


    public function registerSession(Session $session) : void
    {
        $session->attach($this);

        $this->sessions->attach($session->id(), $session);
    }


    private function send(SessionId $sessionId, Message $message) : void
    {
        // Serialize the message into raw data.
        // Send via the transport.

        $session = $this->sessions[$sessionId];
        $session->write(sprintf("Tx: %d: %s\n", $sessionId->integer(), print_r($message, true)));
    }
}