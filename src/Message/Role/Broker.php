<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Role;

class Broker implements Router
{
    public static function name() : string
    {
        return 'broker';
    }
}