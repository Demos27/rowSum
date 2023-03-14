<?php

namespace Src\Checkers;

class IntChecker extends AbstractChecker
{
    public function check(): bool
    {
        $subject = $this->getSubject();

       if (is_array($subject)) {
           foreach ($subject as $n) {
               if (!is_numeric($n) || is_float($n)) {
                   $this->setError('Значение - не целое число.');
                   return false;
               }
           };
       }

       return true;
    }
}