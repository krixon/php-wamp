<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Session\SessionId;

class Welcome implements Message
{
    private $sessionId;
    private $details;


    public function __construct(SessionId $sessionId, WelcomeDetails $details)
    {
        $this->sessionId = $sessionId;
        $this->details   = $details;
    }


    public static function code() : int
    {
        return 2;
    }


    public function sessionId() : SessionId
    {
        return $this->sessionId;
    }


    public function details() : WelcomeDetails
    {
        return $this->details;
    }
}