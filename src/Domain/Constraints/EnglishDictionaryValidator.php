<?php // src/AppBundle/Validator/Constraint/HasValidDimensionsValidator.php

namespace App\Domain\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\Domain\Models\Dictionary;

/**
 * @Annotation
 */
class EnglishDictionaryValidator extends ConstraintValidator
{
    public function __construct(
        protected Dictionary $dictionary,
    ) {
    }   public function validate($value, Constraint $constraint): void
   {
      if (!is_null($value) && !$this->dictionary->isInEnglishDictionary($value)) {
         $this->context
            ->buildViolation($constraint->invalidWord)
            ->addViolation();
      }
   }
}
