<?php

namespace App\Tests\WordController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WordControllerTest extends WebTestCase
{
   protected $client;

   protected function setUp(): void
   {
      $this->client = static::createClient();
   }

   private function getJson()
   {
      $response = $this->client->getResponse();
      $responseData = json_decode($response->getContent(), true);
      return $responseData;
   }

   public function test_that_api_is_going_to_reject_if_word_is_null(): void
   {
      $this->client->request('GET', '/word/points');

      $this->assertResponseStatusCodeSame(400);
      $this->assertEquals("This value should not be blank.", $this->getJson()['error']);
   }

   public function test_should_fail_if_word_isnt_in_en_dict(): void
   {
      $this->client->request('GET', '/word/points?word=stolica');

      $this->assertResponseStatusCodeSame(400);
      $this->assertEquals("This word does not exist in english dictionary.", $this->getJson()['error']);
   }

   public function test_should_succeed_and_give_points_for_unique_letter(): void
   {
      $this->client->request('GET', '/word/points?word=dog');

      $this->assertResponseStatusCodeSame(200);
      $this->assertEquals(3, $this->getJson()['points']);
   }

   public function test_should_succeed_and_give_points_for_unique_letter_and_palindrome(): void
   {
      $this->client->request('GET', '/word/points?word=madam');

      $this->assertResponseStatusCodeSame(200);
      $this->assertEquals(6, $this->getJson()['points']);
   }

   public function test_should_succeed_and_give_points_for_unique_letter_and_almost_palindrome(): void
   {
      $this->client->request('GET', '/word/points?word=dented');

      $this->assertResponseStatusCodeSame(200);
      $this->assertEquals(6, $this->getJson()['points']);
   }
}
