<?php

namespace App\Domain\Points;

use App\Domain\Word\Word;

class CalculateWordPoints
{
    /**
     * @param WordPointRule[] $rules
     */
    public function __construct(
        private iterable $rules
    )
    {
    }

    public function calculate(Word $word): int
    {
        $allPoints = 0;
        foreach ($this->rules as $rule) {
            $allPoints += $rule->getPoints($word);
        }

        return $allPoints;
    }
}
