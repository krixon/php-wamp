<?php

declare(strict_types=1);

namespace Krixon\Wamp\Serializer;

use Exception;
use Krixon\Wamp\Identifier\Uri;
use Krixon\Wamp\Message\Hello;
use Krixon\Wamp\Message\HelloDetails;
use Krixon\Wamp\Message\Message;
use Krixon\Wamp\Message\Role\Callee;
use Krixon\Wamp\Message\Role\Caller;
use Krixon\Wamp\Message\Role\Publisher;
use Krixon\Wamp\Message\Role\Subscriber;
use Krixon\Wamp\Message\Welcome;
use function json_decode;
use function json_encode;
use const JSON_PRETTY_PRINT;

// FIXME: The spec dictates special encoding of binary data. Just using json_encode / json_decode isn't good enough.
// TODO: This is a temporary placeholder class. It needs to be replaced with something like JMS Serializer or
//       Symfony's serializer component. We need to support formats, extensibility for custom messages etc.
class JsonSerializer implements Serializer
{
    public function serialize(Message $message) : string
    {
        $normalized = $this->normalize($message);

        return json_encode($normalized, JSON_PRETTY_PRINT);
    }


    public function deserialize(string $data) : Message
    {
        $normalized = json_decode($data, true);

        return $this->denormalize($normalized);
    }


    private function normalize(Message $message) : array
    {
        $data = [$message::code()];

        switch (true) {
            case $message instanceof Welcome:
                $data[] = $message->sessionId()->integer();
                $data[] = $message->details()->attributes();
                break;
        }

        return $data;
    }


    private function denormalize(array $data) : Message
    {
        $code = $data[0];

        switch ($code) {
            case Hello::code():
                $realm = Uri::custom($data[1]);
                $roles = [];
                foreach ($data[2]['roles'] as $name => $features) {
                    switch ($name) {
                        case 'publisher':
                            $roles[] = new Publisher();
                            break;
                        case 'subscriber':
                            $roles[] = new Subscriber();
                            break;
                        case 'caller':
                            $roles[] = new Caller();
                            break;
                        case 'callee':
                            $roles[] = new Callee();
                            break;
                    }
                }
                $details = HelloDetails::default(...$roles);

                return new Hello($realm, $details);
        }

        throw new Exception('Unknown message code');
    }
}