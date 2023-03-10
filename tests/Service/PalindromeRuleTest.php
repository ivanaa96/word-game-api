<?php

namespace App\Tests\WordController;

use App\Service\WordPoints\PalindromeRule;
use PHPUnit\Framework\TestCase;

class PalindromeRuleTest extends TestCase
{
   protected PalindromeRule $instance;

   protected function setUp(): void
   {
      $this->instance = new PalindromeRule();
   }

   public function test_should_give_points_if_palindrome_word()
   {
      $this->assertEquals(3, $this->instance->getPoints('level'));
   }

   public function test_should_not_give_points_if_word_isnt_palindrome()
   {
      $this->assertEquals(0, $this->instance->getPoints('dinner'));
   }
}
