<?php

namespace NoraShirokuma\CommonPhp;

use Stringable;

/**
 * Intプリミティブ型ラッパークラス
 */
abstract class AbstractInt implements Stringable
{
    protected ?int $value;

    public function __construct(?int $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    protected function validate(?int $value)
    {
    }

    public function value(): ?int
    {
        return $this->value;
    }

    public function toString(): string
    {
        if (is_null($this->value)) {
            return 'null';
        }

        return strval($this->value);
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}