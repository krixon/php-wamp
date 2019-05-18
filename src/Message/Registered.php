<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Request\RequestId;
use Krixon\Wamp\Rpc\RegistrationId;

final class Registered implements Message
{
    use ContainsRegistrationId;
    use ContainsRequestId;

    private $registrationId;


    public function __construct(RequestId $requestId, RegistrationId $registrationId)
    {
        $this->requestId      = $requestId;
        $this->registrationId = $registrationId;
    }


    public static function code() : int
    {
        return 33;
    }
}