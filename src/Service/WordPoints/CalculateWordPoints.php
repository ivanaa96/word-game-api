<?php

namespace App\Service\WordPoints;

use App\Models\Word;

class CalculateWordPoints
{
   public function calculate(Word $word)
   {
      $rules = [
         new UniqueLettersRule(),
         new PalindromeRule(),
         new IsAlmostPalindromeRule(),
      ];

      $allPoints = 0;
      foreach ($rules as $rule) {
         $allPoints += $rule->getPoints($word->getWord());
      }

      return $allPoints;
   }
}
