<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;

class Hello implements Message
{
    private $realm;
    private $details;


    public function __construct(Uri $realm, HelloDetails $details)
    {
        $this->realm   = $realm;
        $this->details = $details;
    }


    public static function code() : int
    {
        return 1;
    }


    public function __toString() : string
    {
        return sprintf('[HELLO, Realm: %s]', $this->realm);
    }


    public function realm() : Uri
    {
        return $this->realm;
    }


    public function details() : HelloDetails
    {
        return $this->details;
    }
}