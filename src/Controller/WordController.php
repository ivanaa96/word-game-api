<?php

namespace App\Controller;

use App\Models\Word;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\WordPoints\CalculateWordPoints;

class WordController extends AbstractController
{
   public function __construct(
      protected CalculateWordPoints $calculatePoints,
   ) {
   }

   #[Route('/word/points', name: 'word-points')]
   public function getWordPoints(Request $request, ValidatorInterface $validator): JsonResponse
   {
      $word = new Word($request->query->get('word'));

      $errors = $validator->validate($word);
      if (count($errors) > 0) {
         return $this->json([
            'error' => $errors[0]->getMessage()
         ], 400);
      }

      return $this->json([
         'points' => $this->calculatePoints->calculate($word)
      ]);
   }
}
