<?php

namespace NoraShirokuma\CommonPhp\UseCase;

abstract class UseCase
{
    abstract public function execute(UseCaseRequest $request): UseCaseResponse;
}