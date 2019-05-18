<?php

declare(strict_types=1);

namespace Krixon\Wamp;

use Krixon\Wamp\Identifier\Uri;
use RuntimeException;
use Throwable;

final class Error extends RuntimeException
{
    private $uri;


    public function __construct(Uri $uri, Throwable $previous = null)
    {
        parent::__construct($uri->string(), 0, $previous);

        $this->uri = $uri;
    }
}