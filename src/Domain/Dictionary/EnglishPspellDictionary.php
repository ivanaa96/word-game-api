<?php

namespace App\Domain\Dictionary;

class EnglishPspellDictionary implements Dictionary
{
    public function isInDictionary(string $word): bool
    {
        return pspell_check(pspell_new("en"), $word);
    }
}
