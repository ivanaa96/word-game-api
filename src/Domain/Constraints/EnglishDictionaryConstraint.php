<?php

namespace App\Domain\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class EnglishDictionaryConstraint extends Constraint
{
   public string $invalidWord = 'This word does not exist in english dictionary.';

   public function validatedBy(): string
   {
      return EnglishDictionaryValidator::class;
   }
}
