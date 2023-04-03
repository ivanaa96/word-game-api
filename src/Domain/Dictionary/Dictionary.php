<?php

namespace App\Domain\Dictionary;

interface Dictionary
{
    public function isInDictionary(string $word): bool;
}
