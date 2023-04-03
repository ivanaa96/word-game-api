<?php

namespace App\Adapter\Controller;

use App\Application\Points;
use App\Domain\Dictionary\NotEnglishWordException;
use App\Domain\Word\NotAWordException;
use App\Domain\Word\WordContainsSymbolException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WordController extends AbstractController
{
    public function __construct(
        protected Points $calculatePoints,
    ) {
    }

    /**
     * @throws NotAWordException
     * @throws WordContainsSymbolException
     * @throws NotEnglishWordException
     */
    #[Route('/word/points', name: 'word-points')]
    public function getWordPoints(Request $request): JsonResponse
    {
        $word = $request->query->get('word', '');
        $points = $this->calculatePoints->getPointsForWord($word);

        return $this->json([
            'points' => $points
        ]);
    }
}
