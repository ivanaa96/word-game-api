<?php

namespace App\Application;

use App\Domain\Dictionary\Constraints\EnglishDictionaryConstraint;
use App\Domain\Dictionary\NotEnglishWordException;
use App\Domain\Points\CalculateWordPoints;
use App\Domain\Word\NotAWordException;
use App\Domain\Word\Word;
use App\Domain\Word\WordContainsSymbolException;
use InvalidArgumentException;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Points
{
    public function __construct(
        protected ValidatorInterface  $validator,
        protected CalculateWordPoints $calculateWordPoints,
    ) {
    }

    /**
     * @throws WordContainsSymbolException
     * @throws NotEnglishWordException
     * @throws NotAWordException
     */
    public function getPointsForWord(string $value): int
    {
        $word = new Word($value);

        $errors = $this->validator->validate($word);

        if (count($errors->violations) > 0) {
            $violation = get_class($errors->violations[0]->getConstraint());
            throw match ($violation) {
                Regex::class => new WordContainsSymbolException(),
                EnglishDictionaryConstraint::class => new NotEnglishWordException(),
                NotBlank::class => new NotAWordException(),
                default => new InvalidArgumentException($errors[0]->getMessage()),
            };
        }


        return $this->calculateWordPoints->calculate($word);
    }
}
