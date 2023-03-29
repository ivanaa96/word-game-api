<?php

namespace App\Domain\Service\WordPoints;

use App\Domain\Models\Word;

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
