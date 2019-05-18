<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

trait ContainsArguments
{
    private $arguments;


    public function arguments() : Arguments
    {
        if (!$this->arguments) {
            $this->arguments = Arguments::none();
        }

        return $this->arguments;
    }
}