<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Request\RequestId;

final class Register implements Message
{
    use ContainsGenericOptions;
    use ContainsProcedure;
    use ContainsRequestId;

    private $procedure;


    public function __construct(RequestId $requestId, Uri $procedure, ?Dictionary $options = null)
    {
        $this->requestId = $requestId;
        $this->procedure = $procedure;
        $this->options   = $options;
    }


    public static function code() : int
    {
        return 64;
    }
}