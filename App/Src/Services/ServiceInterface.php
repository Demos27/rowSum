<?php

namespace Src\Services;

interface ServiceInterface
{
    public function validate(): bool;

    public function process(): void;

    public function getResult(): mixed;
}
