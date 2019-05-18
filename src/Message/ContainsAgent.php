<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

trait ContainsAgent
{
    private $agent;


    /**
     * @return static;
     */
    public function withAgent(string $agent) : self
    {
        if ($agent === $this->agent) {
            return $this;
        }

        $instance = clone $this;
        $instance->agent = $agent;

        return $instance;
    }


    public function agent() : ?string
    {
        return $this->agent;
    }
}