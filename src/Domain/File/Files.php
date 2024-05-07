<?php

namespace NoraShirokuma\CommonPhp\Domain\File;

use NoraShirokuma\CommonPhp\AbstractFirstClassCollection;

class Files extends AbstractFirstClassCollection
{
    protected function getClass(): string
    {
        return File::class;
    }
}