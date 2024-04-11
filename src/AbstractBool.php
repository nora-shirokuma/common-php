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
    public function getValue(): ?bool
    {
        return $this->value;
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