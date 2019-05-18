<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Request\RequestId;
use Krixon\Wamp\Rpc\RegistrationId;

class Invocation implements Message
{
    use ContainsArguments;
    use ContainsGenericDetails;
    use ContainsRegistrationId;
    use ContainsRequestId;


    public function __construct(
        RequestId $requestId,
        RegistrationId $registrationId,
        ?Dictionary $details = null,
        ?Arguments $arguments = null
    ) {
        $this->requestId      = $requestId;
        $this->registrationId = $registrationId;
        $this->arguments      = $arguments;
        $this->details        = $details;
    }


    public static function code() : int
    {
        return 68;
    }
}