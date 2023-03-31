<?php

namespace App\Domain\Dictionary;

interface DictionaryInterface
{
    public function isInDictionary(string $word): bool;
}
