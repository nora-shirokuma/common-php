<?php

namespace NoraShirokuma\CommonPhp;

use RuntimeException;
use Stringable;

abstract class AbstractInt implements Stringable
{
    protected ?int $value;

    public function __construct(?int $value = null)
    {
        $this->validate($value);
        $this->value = $value;
    }

    protected function validate(?int $value): void
    {
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function __get(string $name): ?int
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