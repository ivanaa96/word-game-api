<?php

namespace App\Application;

use App\Domain\Dictionary\NotEnglishWordException;
use App\Domain\Points\CalculateWordPoints;
use App\Domain\Word\NotAWordException;
use App\Domain\Word\Word;
use App\Domain\Word\WordContainsSymbolException;
use InvalidArgumentException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Points
{
    protected array $constraints;

    public function __construct(
        protected ValidatorInterface  $validator,
        protected CalculateWordPoints $calculateWordPoints,
    ) {
        $this->constraints = [];
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

        foreach ($errors->violations as $violation) {
            $constraint = $violation->getConstraint();
            $this->constraints[] = get_class($constraint);
            print_r($this->constraints);
        }

        if (count($this->constraints) > 0) {
            foreach ($this->constraints as $value) {
                throw match ($value) {
                    'Symfony\Component\Validator\Constraints\Regex' => new WordContainsSymbolException(),
                    'App\Domain\Constraints\EnglishDictionaryConstraint' => new NotEnglishWordException(),
                    'Symfony\Component\Validator\Constraints\NotBlank' => new NotAWordException(),
                    default => new InvalidArgumentException($errors[0]->getMessage()),
                };
            }
        }


        return $this->calculateWordPoints->calculate($word);
    }
}
