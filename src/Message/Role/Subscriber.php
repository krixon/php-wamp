<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Role;

class Subscriber implements Client
{
    public static function name() : string
    {
        return 'subscriber';
    }
}