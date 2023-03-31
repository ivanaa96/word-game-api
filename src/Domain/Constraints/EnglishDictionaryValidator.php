<?php

namespace App\Domain\Constraints;

use App\Domain\Dictionary\DictionaryInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
class EnglishDictionaryValidator extends ConstraintValidator
{
    public function __construct(
        protected DictionaryInterface $dictionary,
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
