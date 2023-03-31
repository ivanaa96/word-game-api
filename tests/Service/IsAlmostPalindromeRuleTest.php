<?php

namespace App\Tests\Service;

use App\Domain\Points\IsAlmostPalindromeRule;
use App\Domain\Word\Word;
use PHPUnit\Framework\TestCase;

class IsAlmostPalindromeRuleTest extends TestCase
{
    protected IsAlmostPalindromeRule $instance;

    protected function setUp(): void
    {
        $this->instance = new IsAlmostPalindromeRule();
    }

    public function test_should_give_points_if_word_is_almost_palindrome()
    {
        $this->assertEquals(2, $this->instance->getPoints(new Word('dented')));
    }

    public function test_should_not_give_points_if_word_isnt_almost_palindrome()
    {
        $this->assertEquals(0, $this->instance->getPoints(new Word('dinner')));
    }

    public function test_should_not_give_points_if_word_is_palindrome()
    {
        $this->assertEquals(0, $this->instance->getPoints(new Word('level')));
    }
}
