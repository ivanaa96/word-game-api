<?php

namespace App\Domain\Service\WordPoints;

use App\Domain\Models\Word;

interface WordPointRule
{
   function getPoints(Word $word): int;
}
