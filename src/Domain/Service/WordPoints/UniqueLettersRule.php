<?php

namespace App\Domain\Service\WordPoints;

use App\Domain\Models\Word;

class UniqueLettersRule implements WordPointRule
{
   public function getPoints(Word $word): int
   {
      $uniqueLetters = array_unique(str_split(strtolower($word)));
      return count($uniqueLetters);
   }
}
