<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Request\RequestId;

class Unsubscribed implements Message
{
    use ContainsRequestId;


    public function __construct(RequestId $requestId)
    {
        $this->requestId = $requestId;
    }


    public static function code() : int
    {
        return 35;
    }
}