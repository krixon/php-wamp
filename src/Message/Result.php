<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Request\RequestId;

class Result implements Message
{
    use ContainsArguments;
    use ContainsGenericDetails;
    use ContainsRequestId;


    public function __construct(RequestId $requestId, ?Dictionary $details = null, ?Arguments $arguments = null)
    {
        $this->requestId = $requestId;
        $this->details   = $details;
        $this->arguments = $arguments;
    }


    public static function code() : int
    {
        return 50;
    }
}