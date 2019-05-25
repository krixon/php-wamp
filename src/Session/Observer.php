<?php

declare(strict_types=1);

namespace Krixon\Wamp\Session;

interface Observer
{
    public function onSessionDataReceived(Session $session, string $data);
}