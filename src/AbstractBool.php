<?php

namespace NoraShirokuma\CommonPhp;

use RuntimeException;

abstract class AbstractBool
{
    protected ?bool $value;

    public function __construct(?bool $value)
    {
        $this->value = $value;
    }

    public function getValue(): ?bool
    {
        return $this->value;
    }

    public function __get(string $name): ?bool
    {
        if ($name === 'value') {
            return $this->getValue();
        }

        throw new RuntimeException();
    }

    public function toString(): string
    {
        if (is_null($this->value)) {
            return 'null';
        }
        if ($this->value === true) {
            return 'true';
        }
        return 'false';
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}