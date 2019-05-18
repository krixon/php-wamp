<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\PubSub\SubscriptionId;
use Krixon\Wamp\Request\RequestId;

class Subscribed implements Message
{
    use ContainsRequestId;
    use ContainsSubscriptionId;


    public function __construct(RequestId $requestId, SubscriptionId $subscriptionId)
    {
        $this->requestId      = $requestId;
        $this->subscriptionId = $subscriptionId;
    }


    public static function code() : int
    {
        return 33;
    }
}