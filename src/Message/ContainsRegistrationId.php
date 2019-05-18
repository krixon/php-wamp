<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Rpc\RegistrationId;

trait ContainsRegistrationId
{
    private $registrationId;


    public function registrationId() : RegistrationId
    {
        return $this->registrationId;
    }
}