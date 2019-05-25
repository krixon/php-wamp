<?php

declare(strict_types=1);

namespace Krixon\Wamp\Transport;

use Krixon\Wamp\Peer\Router;
use React\Socket\ConnectionInterface;
use React\Socket\ServerInterface;

class SocketServer extends RouterTransport
{
    private $server;


    public function __construct(ServerInterface $server, Router $router)
    {
        parent::__construct($router);

        $this->server = $server;

        $this->server->on(
            'connection',
            function (ConnectionInterface $connection) {
                $this->onConnection($connection);
            }
        );
    }


    private function onConnection(ConnectionInterface $connection) : void
    {
        $sessionId = $this->generateSessionId();
        $session   = new SocketSession($sessionId, $connection);

        $this->notifySession($session);
    }
}