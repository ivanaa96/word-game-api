<?php

namespace App\Domain\Dictionary;

class Dictionary implements DictionaryInterface
{
    public function isInDictionary(string $word): bool
    {
        return pspell_check(pspell_new("en"), $word);
    }
}
