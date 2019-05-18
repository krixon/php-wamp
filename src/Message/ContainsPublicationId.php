<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\PubSub\PublicationId;

trait ContainsPublicationId
{
    private $publicationId;


    public function publicationId() : PublicationId
    {
        return $this->publicationId;
    }
}