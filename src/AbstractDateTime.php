<?php

namespace NoraShirokuma\CommonPhp;

use Carbon\Carbon;
use Stringable;

abstract class AbstractDateTime implements Stringable
{
    protected ?Carbon $value;

    public function __construct(?string $value)
    {
        if (is_null($value)) {
            $this->value = null;
        } else {
            $this->value = new Carbon($value);
        }
    }

    public function value(): string
    {
        return $this->value?->format('Y-m-d H:i:s') ?? '';
    }

    public function isNull(): bool
    {
        return is_null($this->value);
    }

    public function __toString(): string
    {
        return $this->value?->format(
            sprintf(
                'Y/m/d(%s) H:i:s',
                $this->getLocalWeekDay($this->value->dayOfWeek)
            )
        ) ?? '';
    }

    protected function getLocalWeekDay($dayOfWeek): string
    {
        $weekday = ['日', '月', '火', '水', '木', '金', '土'];
        return $weekday[$dayOfWeek];
    }
}