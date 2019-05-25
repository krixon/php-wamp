<?php

declare(strict_types=1);

namespace Krixon\Wamp\Transport;

use Krixon\Wamp\Peer\Router;
use Krixon\Wamp\Session\Session;
use Krixon\Wamp\Session\SessionId;

abstract class RouterTransport
{
    private $router;


    public function __construct(Router $router)
    {
        // TODO: Decouple the Router from the transport entirely via events?

        $this->router = $router;
    }


    final protected function generateSessionId() : SessionId
    {
        return $this->router->generateSessionId();
    }


    final protected function notifySession(Session $session) : void
    {
        $this->router->registerSession($session);
    }
}