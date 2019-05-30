<?php

declare(strict_types=1);

namespace Krixon\Wamp\Peer\Router;

use Krixon\Wamp\LoggerAware;
use Krixon\Wamp\Message\Hello;
use Krixon\Wamp\Message\Message;
use Krixon\Wamp\Message\Welcome;
use Krixon\Wamp\Message\WelcomeDetails;
use Krixon\Wamp\Message\Role as RoleMessage;
use Krixon\Wamp\Peer\Broker;
use Krixon\Wamp\Peer\Dealer;
use Krixon\Wamp\Peer\Router\Exception;
use Krixon\Wamp\Serializer\JsonSerializer;
use Krixon\Wamp\Session\Observer;
use Krixon\Wamp\Session\Session;
use Krixon\Wamp\Session\SessionId;
use Psr\Log\LoggerAwareInterface;
use SplObjectStorage;
use UnexpectedValueException;
use function sprintf;

// TODO: Use a middleware-based bus for message communication.
//       The Router should just be the set of middlewares rather than a single class.
//       Broker and Dealer components can handle specifics
//       Other middlewares can handle the protocol handshake, authentication etc.
//       Serialized messages would be placed onto the bus by a transport implementation.

class Router implements Observer, LoggerAwareInterface
{
    use LoggerAware;

    /** @var Session[]|SplObjectStorage */
    private $sessions;
    private $broker;
    private $dealer;
    private $serializer;


    public function __construct(?Broker $broker, ?Dealer $dealer)
    {
        // FIXME: Assert at least one of dealer or broker was provided.
        $this->broker     = $broker;
        $this->dealer     = $dealer;
        $this->sessions   = new SplObjectStorage();
        $this->serializer = new JsonSerializer(); // TODO: Inject via the interface.
    }


    public function onSessionDataReceived(Session $session, string $data) : void
    {
        // If necessary pass back a promise for the result?
        $this->logger()->debug(sprintf('%s: Rx %db', $session, strlen($data)));

        // Deserialize the data into a Message object.
        $message = $this->serializer->deserialize($data);

        // Is this a HELLO message? If so, send welcome.
        if ($message instanceof Hello) {
            $this->logger()->debug(sprintf('%s: Rx: %s', $session, $message));
            $this->welcome($session);
            return;
        }

        // Is this an ABORT message? If so, close session.
        // etc.
        // Is this a PUB/SUB message? If so, pass to the Broker peer.
        // Is this an RPC message? If so, pass to the Dealer peer.
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


    private function welcome(Session $session) : void
    {
        $session->start(); // CLOSED -> ESTABLISHING

        $roles = [];

        if ($this->broker) {
            $roles[] = new RoleMessage\Broker();
        }

        if ($this->dealer) {
            $roles[] = new RoleMessage\Dealer();
        }

        $this->send(
            $session->id(),
            new Welcome(
                $session->id(),
                WelcomeDetails::default(...$roles)
            )
        );

        $session->establish(); // ESTABLISHING -> ESTABLISHED
    }


    private function send(SessionId $sessionId, Message $message) : void
    {
        $session = $this->session($sessionId);
        $data    = $this->serializer->serialize($message);

        $this->logger()->debug(sprintf('%s: Tx: %s', $session, $data));

        $session->write($data);
    }


    private function session(SessionId $id) : Session
    {
        try {
            return $this->sessions[$id];
        } catch (UnexpectedValueException $exception) {
            throw new Exception\UnknownSession($id);
        }
    }
}