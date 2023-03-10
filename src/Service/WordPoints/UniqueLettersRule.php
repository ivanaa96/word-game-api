<?php

namespace App\Service\WordPoints;

class UniqueLettersRule implements WordPointRule
{
   public function getPoints(string $word): int
   {
      $uniqueLetters = array_unique(str_split(strtolower($word)));
      return count($uniqueLetters);
   }
}
