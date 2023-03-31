<?php

namespace App\Domain\Word;

use App\Domain\Exceptions\ExceptionInterface;
use Exception;

class WordContainsSymbolException extends Exception implements ExceptionInterface
{
    protected $message = "Word should not contain a symbol!";

    public function getErrorMessage(): string
    {
        return $this->message;
    }
}
