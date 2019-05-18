<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Exception;

use InvalidArgumentException;
use Throwable;

class InvalidAttributeKey extends InvalidArgumentException implements MessageException
{
    public function __construct(string $key, Throwable $previous = null)
    {
        $message =
            "Invalid attribute key '$key'. Keys MUST be at least two characters long, start with a lowercase " .
            "letter and consist only of lowercase letters and numbers";

        parent::__construct($message, 0, $previous);
    }
}