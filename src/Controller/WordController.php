<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Application\Points;

class WordController extends AbstractController
{
   public function __construct(
      protected Points $calculatePoints,
   ) {
   }

   #[Route('/word/points', name: 'word-points')]
   public function getWordPoints(Request $request): JsonResponse
   {
       try {
           return $this->json([
               'points' => $this->calculatePoints->getPointsForWord($request->query->get('word', '')),
           ]);
       } catch(\InvalidArgumentException $e) {
           return $this->json(['error' => $e->getMessage()], 400);
       }
   }
}
