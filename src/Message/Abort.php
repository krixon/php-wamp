<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;

final class Abort implements Message
{
    use ContainsGenericDetails;

    private $reason;
    private $details;


    public function __construct(Uri $reason, ?Dictionary $details = null)
    {
        $this->reason  = $reason;
        $this->details = $details;
    }


    public static function code() : int
    {
        return 3;
    }


    public function reason() : Uri
    {
        return $this->reason;
    }
}