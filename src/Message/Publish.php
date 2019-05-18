<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Request\RequestId;

final class Publish implements Message
{
    use ContainsArguments;
    use ContainsGenericOptions;
    use ContainsRequestId;

    private $topic;


    public function __construct(
        RequestId $requestId,
        Uri $topic,
        ?Dictionary $options = null,
        ?Arguments $arguments = null
    ) {
        $this->requestId = $requestId;
        $this->options   = $options;
        $this->topic     = $topic;
        $this->arguments = $arguments;
    }


    public static function code() : int
    {
        return 16;
    }
}