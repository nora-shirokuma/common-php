<?php

namespace NoraShirokuma\CommonPhp;

use ArrayIterator;
use Exception;
use IteratorAggregate;
use Traversable;

abstract class AbstractFirstClassCollection implements IteratorAggregate
{
    protected array $values;

    abstract protected function getClass(): string;

    public function __construct($object = null)
    {
        $this->values = [];

        if (is_null($object)) {
            return;
        }

        $this->values[] = $object;
    }

    /**
     * @throws Exception
     */
    public function add($object): void
    {
        if (is_null($object)) {
            return;
        }

        if (strcmp($this->getClass(), get_class($object)) !== 0) {
            throw new Exception('An inappropriate class instance was specified.');
        }

        $this->values[] = $object;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->values);
    }
}