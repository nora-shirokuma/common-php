<?php

namespace NoraShirokuma\CommonPhp\UseCase;

interface UseCase
{
    public function execute(UseCaseRequest $request): UseCaseResponse;
}