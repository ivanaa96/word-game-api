<?php

namespace App\Domain\Points;

use App\Domain\Word\Word;

class PalindromeRule implements WordPointRule
{
    public function getPoints(Word $word): int
    {
        if ($word->isPalindrome()) {
            return 3;
        }
        return 0;
    }
}
