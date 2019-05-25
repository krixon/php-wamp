<?php

declare(strict_types=1);

namespace Krixon\Wamp\Session;

use SplObjectStorage;

abstract class Session
{
    private $id;
    /** @var Observer[]|SplObjectStorage */
    private $observers;


    public function __construct(SessionId $id)
    {
        $this->id        = $id;
        $this->observers = new SplObjectStorage();
    }


    abstract public function write(string $data) : void;


    public function id() : SessionId
    {
        return $this->id;
    }


    public function attach(Observer $observer) : void
    {
        $this->observers->attach($observer);
    }


    final protected function notifyDataReceived(string $data) : void
    {
        foreach ($this->observers as $observer) {
            $observer->onSessionDataReceived($this, $data);
        }
    }
}