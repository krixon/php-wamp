<?php

declare(strict_types=1);

namespace Krixon\Wamp\Session\Exception;

use LogicException;

class InvalidState extends LogicException implements SessionException
{
}