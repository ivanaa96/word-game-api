<?php

namespace App\Tests\Service;

use App\Domain\Models\Word;
use App\Domain\Service\WordPoints\UniqueLettersRule;
use PHPUnit\Framework\TestCase;

class UniqueLettersRuleTest extends TestCase
{
   protected UniqueLettersRule $instance;

   protected function setUp(): void
   {
      $this->instance = new UniqueLettersRule();
   }

   public function test_should_give_points_for_unique_letters()
   {
      $this->assertEquals(3, $this->instance->getPoints(new Word('level')));
   }
}
