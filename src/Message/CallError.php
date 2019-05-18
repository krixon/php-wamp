<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Request\RequestId;

final class CallError extends Error
{
    use ContainsArguments;


    public function __construct(
        Uri $uri,
        RequestId $requestId,
        ?Dictionary $details = null,
        ?Arguments $arguments = null
    ) {
        parent::__construct(Call::code(), $requestId, $uri, $details);

        $this->arguments = $arguments;
    }
}