<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\PubSub\PublicationId;
use Krixon\Wamp\PubSub\SubscriptionId;

class Event implements Message
{
    use ContainsArguments;
    use ContainsGenericDetails;
    use ContainsPublicationId;

    private $subscriptionId;


    public function __construct(
        SubscriptionId $subscriptionId,
        PublicationId $publicationId,
        ?Dictionary $details = null,
        ?Arguments $arguments = null
    ) {
        $this->subscriptionId = $subscriptionId;
        $this->publicationId  = $publicationId;
        $this->details        = $details;
        $this->arguments      = $arguments;
    }


    public static function code() : int
    {
        return 36;
    }
}