<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Request\RequestId;

final class PublishError extends Error
{
    public function __construct(Uri $uri, RequestId $requestId, ?Dictionary $details = null)
    {
        parent::__construct(Publish::code(), $requestId, $uri, $details);
    }
}