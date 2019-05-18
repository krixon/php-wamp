<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

interface Message
{
    public static function code() : int;
}