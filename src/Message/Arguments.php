<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

final class Arguments
{
    private $positional;
    private $keyword;


    public function __construct(array $positional = [], array $keyword = [])
    {
        $this->positional = array_values($positional);
        $this->keyword    = $keyword;
    }


    public static function none() : self
    {
        return new self();
    }


    public function positional() : array
    {
        return $this->positional;
    }


    public function keyword() : array
    {
        return $this->keyword;
    }
}