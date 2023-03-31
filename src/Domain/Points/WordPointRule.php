<?php

namespace App\Domain\Points;

use App\Domain\Word\Word;

interface WordPointRule
{
    public function getPoints(Word $word): int;
}
