<?php

namespace NoraShirokuma\CommonPhp;

use Stringable;

/**
 * Stringプリミティブ型ラッパークラス
 */
abstract class AbstractString implements Stringable
{
    protected ?string $value;

    public function __construct(?string $value)
    {
        $this->value = $value;
        $this->validate();
    }

    protected function validate()
    {
    }

    public function value(): ?string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return strval($this->value);
    }
}