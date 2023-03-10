<?php

namespace App\Service\WordPoints;

interface WordPointRule
{
   function getPoints(string $word): int;
}
