<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Role;

class Dealer implements Router
{
    public static function name() : string
    {
        return 'dealer';
    }
}