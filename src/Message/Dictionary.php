<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use function preg_match;
use function trim;

/**
 * A key value store which underpins the *Details and *Options classes.
 *
 * This class allows protocol-defined Details and Options to be extended with implementation-defined attributes.
 */
class Dictionary
{
    private $data = [];


    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $name => $value) {
            $this->set($name, $value);
        }
    }


    /**
     * @return static
     */
    public static function empty()
    {
        return new static();
    }


    /**
     * @param mixed $value
     *
     * @return static
     * @throws Exception\InvalidAttributeKey If the key is not at least 2 characters long, does not start with a
     *                                       lowercase ASCII letter character and consist entirely of lowercase ASCII
     *                                       letter and digit characters.
     */
    public function withAttribute(string $name, $value) : self
    {
        $instance = clone $this;

        $instance->set($name, $value);

        return $instance;
    }


    /**
     * @param mixed[] $attributes An array of attribute values indexed by attribute name.
     *
     * @return static
     * @throws Exception\InvalidAttributeKey If the key is not at least 2 characters long, does not start with a
     *                                       lowercase ASCII letter character and consist entirely of lowercase ASCII
     *                                       letter and digit characters.
     */
    public function withAttributes(array $attributes) : self
    {
        $instance = clone $this;

        foreach ($attributes as $name => $value) {
            $instance->set($name, $value);
        }

        return $instance;
    }


    public function attribute(string $name, $default = null)
    {
        return $this->data[$this->normalizeName($name)] ?? $default;
    }


    public function attributes() : array
    {
        return $this->data;
    }


    final protected function set(string $name, $value) : void
    {
        $this->data[$this->normalizeName($name)] = $value;
    }


    private function normalizeName(string $name) : string
    {
        $name = mb_strtolower(trim($name));

        if (!preg_match('/^[a-z][a-z0-9_]{2,}$/', $name)) {
            throw new Exception\InvalidAttributeKey($name);
        }

        return $name;
    }
}