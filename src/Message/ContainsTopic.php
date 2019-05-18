<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;

trait ContainsTopic
{
    private $topic;


    public function topic() : Uri
    {
        return $this->topic;
    }
}