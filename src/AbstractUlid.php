<?php

namespace NoraShirokuma\CommonPhp;

use Exception;

abstract class AbstractUlid extends AbstractString
{
    private const ULID_LENGTH = 26;

    protected function validate()
    {
        parent::validate();
        if (!is_null($this->value) && strlen($this->value) !== self::ULID_LENGTH) {
            throw new Exception('ULIDの長さが不正です。');
        }
    }
}