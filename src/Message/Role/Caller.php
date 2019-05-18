<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Role;

class Caller implements Client
{
    public static function name() : string
    {
        return 'caller';
    }
}