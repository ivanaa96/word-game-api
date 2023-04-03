<?php

namespace App\Domain\Points;

use App\Domain\Word\Word;

class UniqueLettersRule implements WordPointRule
{
    public function getPoints(Word $word): int
    {
        return count($word->getUniqueLetters());
    }
}
