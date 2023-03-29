<?php

namespace App\Application;
use App\Domain\Models\Word;
use App\Domain\Service\WordPoints\CalculateWordPoints;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Points {

    public function __construct(
        protected ValidatorInterface $validator,
        protected CalculateWordPoints $calculateWordPoints,
    ) {
    }

    public function getPointsForWord(string $value) : int
    {
        $word = new Word($value);

        $errors = $this->validator->validate($word);
        if (count($errors) > 0) {
            throw new \InvalidArgumentException($errors[0]->getMessage());
        }

        return $this->calculateWordPoints->calculate($word);
    }
}