<?php

namespace App\Domain\Points;

use App\Domain\Word\Word;

class CalculateWordPoints
{
    public function calculate(Word $word): int
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
