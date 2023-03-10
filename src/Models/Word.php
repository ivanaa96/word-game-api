<?php

namespace App\Models;

use App\Constraints\EnglishDictionaryConstraint;
use Symfony\Component\Validator\Constraints as Assert;

class Word
{
   #[Assert\NotBlank]
   #[Assert\NotNull]
   #[EnglishDictionaryConstraint]
   private $word;

   public function __construct($word)
   {
      $this->word = $word;
   }

   public function getWord(): string
   {
      return $this->word;
   }
}
