<?php

namespace App\Domain\Service\WordPoints;

use App\Domain\Models\Word;

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
         $allPoints += $rule->getPoints($word);
      }

      return $allPoints;
   }
}
