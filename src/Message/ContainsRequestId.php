<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Request\RequestId;

trait ContainsRequestId
{
    private $requestId;


    public function requestId() : RequestId
    {
        return $this->requestId;
    }
}