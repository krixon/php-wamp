<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\PubSub\SubscriptionId;

trait ContainsSubscriptionId
{
    private $subscriptionId;


    public function subscriptionId() : SubscriptionId
    {
        return $this->subscriptionId;
    }
}