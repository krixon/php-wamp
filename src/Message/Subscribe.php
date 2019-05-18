<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Request\RequestId;

class Subscribe implements Message
{
    use ContainsGenericOptions;
    use ContainsRequestId;
    use ContainsTopic;


    public function __construct(RequestId $requestId, Uri $topic, ?Dictionary $options = null)
    {
        $this->requestId = $requestId;
        $this->topic     = $topic;
        $this->options   = $options;
    }


    public static function code() : int
    {
        return 32;
    }
}