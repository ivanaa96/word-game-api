<?php

namespace App\Service\WordPoints;


class IsAlmostPalindromeRule implements WordPointRule
{
   public function getPoints(string $word): int
   {
      if ($this->isPalindrome($word)) {
         return 0;
      }

      for ($i = 0; $i < strlen($word); $i++) {
         $newWord = substr_replace($word, '', $i, 1);
         if ($this->isPalindrome($newWord)) {
            return 2;
         }
      }

      return 0;
   }

   private function isPalindrome(string $word)
   {
      return $word === strrev($word);
   }
}
