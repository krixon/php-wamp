<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Request\RequestId;

class YieldMessage implements Message
{
    use ContainsArguments;
    use ContainsGenericOptions;
    use ContainsRequestId;


    public function __construct(RequestId $requestId, ?Dictionary $options = null, ?Arguments $arguments = null)
    {
        $this->requestId = $requestId;
        $this->options   = $options;
        $this->arguments = $arguments;
    }


    public static function code() : int
    {
        return 70;
    }
}