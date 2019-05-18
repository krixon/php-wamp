<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\PubSub\PublicationId;
use Krixon\Wamp\Request\RequestId;

final class Published implements Message
{
    use ContainsPublicationId;
    use ContainsRequestId;


    public function __construct(RequestId $requestId, PublicationId $publicationId)
    {
        $this->requestId     = $requestId;
        $this->publicationId = $publicationId;
    }


    public static function code() : int
    {
        return 17;
    }
}