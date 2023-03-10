<?php

namespace App\Service\WordPoints;

class PalindromeRule implements WordPointRule
{
   public function getPoints(string $word): int
   {
      $word = strtolower($word);

      return $word === strrev($word) ? 3 : 0;
   }
}
