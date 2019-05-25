<?php

declare(strict_types=1);

namespace Krixon\Wamp\Peer;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message;
use Krixon\Wamp\Transport\Connection;

class Client
{
    private $sessionId;
    private $transport;
    private $realm;
    private $subscriber;


    public function __construct(Connection $transport, Uri $realm, ?Subscriber $subscriber)
    {
        // TODO: Validate at least one role is provided.

        $this->transport  = $transport;
        $this->realm      = $realm;
        $this->subscriber = $subscriber;
    }


    public function run() : void
    {
        // Start the react event loop.
        // Establish the transport.
        // Send a HELLO message via the transport. This should block and return the WELCOME message.
        // Alternatively it could not block as long as any non-WELCOME message results in a protocol error.
        // On WELCOME, set the session ID.

        $roles = [];

        if ($this->subscriber) {
            $roles[] = new Message\Role\Subscriber();
        }

        $hello = new Message\Hello($this->realm, Message\HelloDetails::default(...$roles));

        // TODO: Should transport return a promise here?

        $message = $this->transport->send($hello);
    }
}