<?php

namespace App\Domain\Word;

use App\Domain\Base\DomainException;
use Exception;

class WordContainsSymbolException extends Exception implements DomainException
{
    protected $message = "Word should not contain a symbol!";

    public function getErrorMessage(): string
    {
        return $this->message;
    }
}
