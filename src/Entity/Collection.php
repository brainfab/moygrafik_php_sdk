<?php

namespace Brainfab\MoyGrafik\Entity;

use JMS\Serializer\Annotation as JMS;

class Collection extends Entity implements \Iterator, \Countable, \ArrayAccess
{
    /**
     * Data collection property name.
     *
     * @var string
     */
    protected $key = 'data';


    /**
     * Collection constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->{$this->key} = $data;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->{$this->key}[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->{$this->key}[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->{$this->key}[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->{$this->key}[$offset]);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->{$this->key});
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->{$this->key});
    }

    /**
     * @return int|null|string
     */
    public function key()
    {
        return key($this->{$this->key});
    }

    /**
     * @return bool
     */
    public function valid()
    {
        $key = $this->key();
        return $key !== null && $key !== false;
    }

    /**
     * Rewind the Iterator to the first element.
     */
    public function rewind()
    {
        reset($this->{$this->key});
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->{$this->key});
    }
}
