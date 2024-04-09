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
        $this->value = $value;
        $this->validate();
    }

    protected function validate()
    {
    }

    /**
     * 値を取得します
     * @return int|null
     */
    public function value(): ?int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return strval($this->value);
    }
}