<?php

namespace NoraShirokuma\CommonPhp\UseCase;

use NoraShirokuma\CommonPhp\Domain\Error\Errors;

class Response
{
    private Errors $errors;

    public function __construct(Errors $errors)
    {
        $this->errors = $errors;
    }

    public function hasError(): bool
    {
        return $this->errors->hasObject();
    }
}