<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Role;

class Publisher implements Client
{
    public static function name() : string
    {
        return 'publisher';
    }
}