<?php

namespace App\Domain\Word;

use App\Domain\Dictionary\Constraints\EnglishDictionaryConstraint;
use Symfony\Component\Validator\Constraints as Assert;

class Word
{
    #[Assert\NotBlank]
    #[Assert\NotNull]
    #[EnglishDictionaryConstraint]
    #[Assert\Regex("/^[a-zA-Z]+$/")]
    private string $word;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function isAlmostPalindrome(): bool
    {
        if ($this->isPalindrome()) {
            return false;
        }

        for ($i = 0; $i < strlen($this->word); $i++) {
            $newWord = substr_replace($this->word, '', $i, 1);
            if ($this->compareAreWordsPalindrome($newWord)) {
                return true;
            }
        }
        return false;
    }

    public function isPalindrome(): bool
    {
        return $this->compareAreWordsPalindrome($this->getWord());
    }

    public function getUniqueLetters(): array
    {
        return array_unique(str_split($this->word));
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function __toString(): string
    {
        return $this->getWord();
    }

    public function equalsTo(Word $value): bool
    {
        return $this->getWord() === $value->getWord();
    }

    private function compareAreWordsPalindrome(string $comparedWord): bool
    {
        $word = strtolower($comparedWord);

        return $word === strrev($word);
    }
}
