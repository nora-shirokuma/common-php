<?php

namespace NoraShirokuma\CommonPhp;

use Carbon\Carbon;
use RuntimeException;
use Stringable;

abstract class AbstractDate implements Stringable
{
    protected ?Carbon $value;

    public function __construct(
        ?int $year   = null,
        ?int $month  = null,
        ?int $day    = null,
    )
    {
        $this->validate($year, $month, $day);
        if (
            is_null($year) &&
            is_null($month) &&
            is_null($day)
        ) {
            $this->value = null;
        } else {
            $this->value = Carbon::createFromDate($year, $month, $day);
        }
    }

    protected function validate(
        ?int $year   = null,
        ?int $month  = null,
        ?int $day    = null
    ): void
    {
        if (
            is_null($year) &&
            is_null($month) &&
            is_null($day)
        ) {
            return;
        }

        if (!checkdate($month, $day, $year)) {
            throw new RuntimeException('日付が不正です。');
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
        return $this->value->format('Y-m-d');
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}