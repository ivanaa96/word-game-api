<?php

namespace App\Domain\Models;

class Dictionary
{
    public function isInEnglishDictionary(string $word): bool
    {
        return pspell_check(pspell_new("en"), $word);
    }
}