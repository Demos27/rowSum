<?php

namespace Src\Models;

class Row
{
    public const DEFAULT_SEPARATOR = ' ';

    public function __construct
    (
        private string $row,
        private string $separator = self::DEFAULT_SEPARATOR
    )
    {

    }

    public function getRow(): string
    {
        return $this->row ?? '';
    }

    public function getSeparator(): string
    {
        return $this->separator;
    }
}