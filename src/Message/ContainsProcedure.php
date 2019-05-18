<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;

trait ContainsProcedure
{
    private $procedure;


    public function procedure() : Uri
    {
        return $this->procedure;
    }
}