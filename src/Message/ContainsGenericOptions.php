<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

trait ContainsGenericOptions
{
    private $options;


    public function options() : Dictionary
    {
        if (!$this->options) {
            $this->options = new Dictionary();
        }

        return $this->options;
    }
}