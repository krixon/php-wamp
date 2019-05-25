<?php

declare(strict_types=1);

namespace Krixon\Wamp\Peer;

use Krixon\Wamp\Message\Welcome;

interface WelcomeReceiver
{
    public function receiveWelcome(Welcome $message) : void;
}