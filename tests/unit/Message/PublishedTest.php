<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Krixon\Wamp\Message\Published;
use Krixon\Wamp\PubSub\PublicationId;
use Krixon\Wamp\Request\RequestId;
use PHPUnit\Framework\TestCase;

class PublishedTest extends TestCase
{
    public function testConstruct() : void
    {
        $instance = new Published(RequestId::first(), PublicationId::generate());

        static::assertInstanceOf(Published::class, $instance);
    }


    public static function testProvidesCode() : void
    {
        static::assertSame(17, Published::code());
    }
}