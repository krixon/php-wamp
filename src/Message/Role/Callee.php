<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Role;

class Callee implements Client
{
    public static function name() : string
    {
        return 'callee';
    }
}