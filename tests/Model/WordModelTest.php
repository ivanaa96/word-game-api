<?php

namespace App\Tests\Model;

use App\Domain\Word\Word;
use PHPUnit\Framework\TestCase;

class WordModelTest extends TestCase
{
    public function testGetWord()
    {
        $word = new Word('hello');
        $this->assertEquals('hello', $word->getWord());
    }

    public function testIsPalindrome()
    {
        $word1 = new Word('racecar');
        $word2 = new Word('hello');

        $this->assertTrue($word1->isPalindrome());
        $this->assertFalse($word2->isPalindrome());
    }

    public function testIsAlmostPalindrome()
    {
        $word1 = new Word('racecar');
        $word2 = new Word('hello');
        $word3 = new Word('radar');

        $this->assertFalse($word1->isAlmostPalindrome());
        $this->assertFalse($word2->isAlmostPalindrome());
        $this->assertFalse($word3->isAlmostPalindrome());
    }

    public function testEqualsTo()
    {
        $word = new Word('hello');
        $this->assertTrue($word->equalsTo('hello'));
        $this->assertFalse($word->equalsTo('world'));
    }
}
