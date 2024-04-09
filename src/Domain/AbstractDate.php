<?php

namespace NoraShirokuma\CommonPhp\Domain;

abstract class AbstractDate extends AbstractDateTime
{
    /**
     * 値を取得します
     * @return string 値
     */
    public function value(): string
    {
        return $this->value?->format('Y-m-d') ?? '';
    }

    public function isNull(): bool
    {
        return is_null($this->value);
    }

    public function __toString(): string
    {
        return $this->value?->format(
            sprintf(
                'Y/m/d(%s)',
                $this->getLocalWeekDay($this->value->dayOfWeek)
            )
        ) ?? '0000/00/00(--)';
    }
}