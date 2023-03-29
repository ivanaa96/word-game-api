<?php

namespace App\Domain\Service\WordPoints;

use App\Domain\Models\Word;

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
