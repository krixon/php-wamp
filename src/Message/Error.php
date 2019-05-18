<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Request\RequestId;

abstract class Error implements Message
{
    use ContainsGenericDetails;
    use ContainsRequestId;

    private $uri;
    private $messageCode;


    public function __construct(int $messageCode, RequestId $requestId, Uri $uri, ?Dictionary $details = null)
    {
        $this->messageCode = $messageCode;
        $this->requestId   = $requestId;
        $this->uri         = $uri;
        $this->details     = $details;
    }


    public static function code() : int
    {
        return 8;
    }


    public function messageCode() : int
    {
        return $this->messageCode;
    }
}