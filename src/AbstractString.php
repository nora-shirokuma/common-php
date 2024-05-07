<?php

namespace NoraShirokuma\CommonPhp;

use RuntimeException;
use Stringable;

abstract class AbstractString implements Stringable
{
    protected ?string $value;

    public function __construct(?string $value = null)
    {
        $this->validate($value);
        $this->value = $value;
    }

    protected function validate(?string $value): void
    {
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function __get(string $name): ?string
    {
        if ($name === 'value') {
            return $this->getValue();
        }
        throw new RuntimeException();
    }

    public function isNull(): bool
    {
        return is_null($this->value);
    }

    public function toString(): string
    {
        if ($this->isNull()) {
            return 'null';
        }
        return strval($this->value);
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}