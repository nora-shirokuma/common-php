<?php

namespace NoraShirokuma\CommonPhp;

abstract class AbstractTime extends AbstractDateTime
{
    public function value(): string
    {
        return $this->value?->format('H:i:s') ?? '';
    }

    public function __toString(): string
    {
        return $this->value?->format(
            sprintf(
                'H:i:s(%s)',
                $this->getLocalWeekDay($this->value->dayOfWeek)
            )
        ) ?? '00:00:00';
    }
}