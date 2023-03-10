<?php // src/AppBundle/Validator/Constraint/HasValidDimensionsValidator.php

namespace App\Constraints;

use App\Models\Word;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


/**
 * @Annotation
 */
class EnglishDictionaryValidator extends ConstraintValidator
{
   public function validate($word, Constraint $constraint): void
   {
      if (!is_null($word) && !pspell_check(pspell_new("en"), $word)) {
         $this->context
            ->buildViolation($constraint->invalidWord)
            ->addViolation();
      }
   }
}
