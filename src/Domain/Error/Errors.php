<?php

namespace NoraShirokuma\CommonPhp\Domain\Error;

use NoraShirokuma\CommonPhp\AbstractFirstClassCollection;

class Errors extends AbstractFirstClassCollection
{
    protected function getClass(): string
    {
        return Error::class;
    }
}