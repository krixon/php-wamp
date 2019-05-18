<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Exception;

use LogicException;

class RolesMustBeAnnounced extends LogicException
{
    public function __construct()
    {
        parent::__construct("At least one role must be announced.");
    }
}