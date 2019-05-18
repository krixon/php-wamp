<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Request\RequestId;

final class Call implements Message
{
    use ContainsArguments;
    use ContainsGenericOptions;
    use ContainsRequestId;

    private $procedure;


    public function __construct(
        RequestId $requestId,
        Uri $procedure,
        Dictionary $options = null,
        Arguments $arguments = null
    ) {
        $this->requestId = $requestId;
        $this->procedure = $procedure;
        $this->options   = $options;
        $this->arguments = $arguments;
    }


    public static function code() : int
    {
        return 48;
    }


    public function procedure() : Uri
    {
        return $this->procedure;
    }
}