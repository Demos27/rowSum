<?php

namespace Src\Checkers;

class NotEmptyChecker extends AbstractChecker
{
    public function check(): bool
    {
        if (trim($this->getSubject()) === '') {
            $this->setError('Строка пустая.');
            return false;
        }
        return true;
    }
}
