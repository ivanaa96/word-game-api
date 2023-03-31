<?php

namespace App\Domain\Points;

use App\Domain\Word\Word;

class UniqueLettersRule implements WordPointRule
{
    public function getPoints(Word $word): int
    {
        $uniqueLetters = array_unique(str_split($word));

        return count($uniqueLetters);
    }
}
