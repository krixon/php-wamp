<?php

declare(strict_types=1);

namespace Krixon\Wamp\Serializer;

use Krixon\Wamp\Message\Message;

interface Serializer
{
    public function serialize(Message $message) : string;
    public function deserialize(string $data) : Message;
}