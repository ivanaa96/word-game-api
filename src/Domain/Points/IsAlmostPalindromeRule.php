<?php

namespace App\Domain\Points;

use App\Domain\Word\Word;

class IsAlmostPalindromeRule implements WordPointRule
{
    public function getPoints(Word $word): int
    {
        if ($word->isAlmostPalindrome()) {
            return 2;
        }
        return 0;
    }
}
