<?php

namespace NoraShirokuma\CommonPhp;

use Carbon\Carbon;
use RuntimeException;
use Stringable;

abstract class AbstractDateTime implements Stringable
{
    protected ?Carbon $value;

    public function __construct(
        ?int $year   = null,
        ?int $month  = null,
        ?int $day    = null,
        ?int $hour   = null,
        ?int $minute = null,
        ?int $second = null
    )
    {
        $this->validate($year, $month, $day, $hour, $minute, $second);
        if (
            is_null($year) &&
            is_null($month) &&
            is_null($day) &&
            is_null($hour) &&
            is_null($minute) &&
            is_null($second)
        ) {
            $this->value = null;
        } else {
            $this->value = Carbon::create($year, $month, $day, $hour, $minute, $second);
        }
    }

    protected function validate(
        ?int $year   = null,
        ?int $month  = null,
        ?int $day    = null,
        ?int $hour   = null,
        ?int $minute = null,
        ?int $second = null
    ): void
    {
        if (
            is_null($year) &&
            is_null($month) &&
            is_null($day) &&
            is_null($hour) &&
            is_null($minute) &&
            is_null($second)
        ) {
            return;
        }

        if (!checkdate($month, $day, $year)) {
            throw new RuntimeException('日付が不正です。');
        }
        if (!(0 <= $hour && $hour <= 23)) {
            throw new RuntimeException('時刻(時)が不正です。');
        }
        if (!(0 <= $minute && $minute <= 59)) {
            throw new RuntimeException('時刻(分)が不正です。');
        }
        if (!(0 <= $second && $second <= 59)) {
            throw new RuntimeException('時刻(秒)が不正です。');
        }
    }

    public function getValue(): ?Carbon
    {
        return $this->value;
    }
    
    public function __get(string $name): ?Carbon
    {
        if ($name === 'value') {
            return $this->getValue();
        }
        throw new RuntimeException();
    }

    public function isNull(): bool
    {
        return is_null($this->value);
    }

    public function toString(): string
    {
        if ($this->isNull()) {
            return 'null';
        }
        return $this->value->format('Y-m-d H:i:s');
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}