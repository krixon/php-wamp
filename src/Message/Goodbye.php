<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Identifier\Uri;

class Goodbye implements Message
{
    use ContainsGenericDetails;

    private $reason;


    public function __construct(Uri $reason, ?Dictionary $details = null)
    {
        $this->reason  = $reason;
        $this->details = $details;
    }


    public static function code() : int
    {
        return 6;
    }
}