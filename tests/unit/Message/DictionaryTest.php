<?php

declare(strict_types=1);

namespace Krixon\Wamp\Tests\Unit\Message;

use Generator;
use Krixon\Wamp\Message\Dictionary;
use Krixon\Wamp\Message\Exception\InvalidAttributeKey;
use PHPUnit\Framework\TestCase;

class DictionaryTest extends TestCase
{
    public static function testConstructWithAttributes() : void
    {
        $attributes = [
            'string'  => 'foo',
            'integer' => 42,
            'list'    => [1, 2, 3],
            'dict'    => ['color' => 'green'],
        ];

        $dictionary = new Dictionary($attributes);

        static::assertEquals($attributes, $dictionary->attributes());
    }


    /**
     * @dataProvider provideDataForWithAttribute
     *
     * @param mixed $value
     */
    public static function testWithAttribute(string $key, $value) : void
    {
        $dictionary = (new Dictionary())->withAttribute($key, $value);

        static::assertSame($value, $dictionary->attribute($key));
    }


    public static function provideDataForWithAttribute() : Generator
    {
        yield 'String value'  => ['foo', 'string'];
        yield 'Integer value' => ['foo', 42];
    }


    /**
     * @dataProvider provideDataForKeyNormalization
     */
    public static function testNormalizesKeysOnWithAttribute(string $denormalized, string $normalized) : void
    {
        $dictionary = (new Dictionary())->withAttribute($denormalized, 'value');

        static::assertSame('value', $dictionary->attribute($normalized));
    }


    public static function provideDataForKeyNormalization() : Generator
    {
        yield 'Converts to lowercase' => ['FoO', 'foo'];
        yield 'Trims whitespace'      => [" \tfoo\n", 'foo'];
    }


    /**
     * @dataProvider provideDataForThrowsOnInvalidKey
     */
    public function testThrowsOnInvalidKey(string $key) : void
    {
        $this->expectException(InvalidAttributeKey::class);

        (new Dictionary())->withAttribute($key, 42);
    }


    public static function provideDataForThrowsOnInvalidKey() : Generator
    {
        yield 'Starts with a number'        => ['1foo'];
        yield 'Less that 2 characters long' => ['a'];
        yield 'Non-ASCII characters'        => ['ês'];
    }


    public static function testWithAttributes() : void
    {
        $attributes = [
            'string'  => 'foo',
            'integer' => 42,
            'list'    => [1, 2, 3],
            'dict'    => ['color' => 'green'],
        ];

        $dictionary = Dictionary::empty()->withAttributes($attributes);

        static::assertEquals($attributes, $dictionary->attributes());
    }
}