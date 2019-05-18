<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Request\RequestId;
use Krixon\Wamp\Rpc\RegistrationId;

final class Unregister implements Message
{
    use ContainsRegistrationId;
    use ContainsRequestId;


    public function __construct(RequestId $requestId, RegistrationId $registrationId)
    {
        $this->requestId      = $requestId;
        $this->registrationId = $registrationId;
    }


    public static function code() : int
    {
        return 66;
    }
}