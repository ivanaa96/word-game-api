<?php

namespace App\Domain\Dictionary\Constraints;

use App\Domain\Dictionary\Dictionary;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
class EnglishDictionaryValidator extends ConstraintValidator
{
    public function __construct(
        protected Dictionary $dictionary,
    ) {
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!is_null($value) && !$this->dictionary->isInDictionary($value)) {
            $this->context
                ->buildViolation($constraint->invalidWord)
                ->addViolation();
        }
    }
}
