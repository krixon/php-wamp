<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

trait ContainsGenericDetails
{
    private $details;


    public function details() : Dictionary
    {
        if (!$this->details) {
            $this->details = new Dictionary();
        }

        return $this->details;
    }
}