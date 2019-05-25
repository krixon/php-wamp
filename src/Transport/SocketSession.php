<?php

declare(strict_types=1);

namespace Krixon\Wamp\Transport;

use Krixon\Wamp\Session\Session;
use Krixon\Wamp\Session\SessionId;
use React\Socket\ConnectionInterface;

class SocketSession extends Session
{
    private $connection;


    public function __construct(SessionId $id, ConnectionInterface $connection)
    {
        parent::__construct($id);

        $connection->on(
            'data',
            function (string $data) : void {
                $this->notifyDataReceived($data);
            }
        );

        $this->connection = $connection;
    }


    public function write(string $data) : void
    {
        $this->connection->write($data);
    }
}