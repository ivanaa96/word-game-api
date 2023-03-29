<?php

namespace App\Domain\Models;

use App\Domain\Constraints\EnglishDictionaryConstraint;
use Symfony\Component\Validator\Constraints as Assert;

class Word
{
    #[Assert\NotBlank]
    #[Assert\NotNull]
    #[EnglishDictionaryConstraint]
    private string $word;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function isPalindrome(): bool
    {
        return $this->compareAreWordsPalindrome($this->getWord());
    }

    private function compareAreWordsPalindrome(string $comparedWord) : bool
    {
        $word = strtolower($comparedWord);
        return $word === strrev($word);
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

    public function __toString()
    {
        return $this->getWord();
    }
}
