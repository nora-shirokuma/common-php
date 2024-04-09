<?php

namespace NoraShirokuma\CommonPhp\Domain;

/**
 * Boolプリミティブ型ラッパークラス
 */
abstract class AbstractBool
{
    protected ?bool $value;

    /**
     * コンストラクタ
     */
    public function __construct(?bool $value)
    {
        $this->value = $value;
    }

    public function value(): ?bool
    {
        return $this->value;
    }

    public static function int2Bool(int $value): bool
    {
        return $value === 1;
    }
}