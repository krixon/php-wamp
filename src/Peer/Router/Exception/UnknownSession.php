<?php

declare(strict_types=1);

namespace Krixon\Wamp\Peer\Router\Exception;

use Krixon\Wamp\Session\SessionId;
use OutOfBoundsException;

class UnknownSession extends OutOfBoundsException implements TransportException
{
    public function __construct(SessionId $id)
    {
        parent::__construct(sprintf('Unknown session with ID: %d', $id->integer()));
    }
}