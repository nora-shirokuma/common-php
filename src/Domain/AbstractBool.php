<?php

namespace NoraShirokuma\CommonPhp\Domain;

/**
 * Boolプリミティブ型ラッパークラス
 */
abstract class AbstractBool
{
    /**
     * 内包するBool値
     * @var bool|null
     */
    protected ?bool $value;

    /**
     * コンストラクタ
     */
    public function __construct(?bool $value)
    {
        $this->value = $value;
    }

    /**
     * 内包するBool値を取得します
     * @return bool|null
     */
    public function value(): ?bool
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return bool
     */
    public static function int2Bool(int $value): bool
    {
        return $value === 1;
    }
}