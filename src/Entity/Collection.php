<?php

namespace Brainfab\MoyGrafik\Entity;

class Collection extends AbstractEntity implements \Iterator, \Countable, \ArrayAccess
{
    protected $key = 'data';

    public function __construct(array $data = [])
    {
        $this->{$this->key} = $data;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->{$this->key}[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->{$this->key}[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->{$this->key}[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->{$this->key}[$offset]);
    }

    public function current()
    {
        return current($this->{$this->key});
    }

    public function next()
    {
        return next($this->{$this->key});
    }

    public function key()
    {
        return key($this->{$this->key});
    }

    public function valid(): bool
    {
        $key = $this->key();
        return $key !== null && $key !== false;
    }

    public function rewind(): void
    {
        reset($this->{$this->key});
    }

    public function count(): int
    {
        return count($this->{$this->key});
    }

    public function filter(callable $callback): self
    {
        $result = array_filter($this->{$this->key}, $callback);

        return new static((array) $result);
    }

    public function first()
    {
        return reset($this->{$this->key});
    }
}
