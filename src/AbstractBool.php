<?php

namespace NoraShirokuma\CommonPhp;

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
}