<?php

namespace Src\Checkers;

abstract class AbstractChecker
{
    public function __construct(
        private $subject,
        private ?string $error = null
    )
    {
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function setError(string $error): void
    {
        $this->error = $error;
    }

    abstract public function check(): bool;
}