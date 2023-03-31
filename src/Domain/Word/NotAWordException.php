<?php

namespace App\Domain\Word;

use App\Domain\Exceptions\ExceptionInterface;
use Exception;

class NotAWordException extends Exception implements ExceptionInterface
{
    protected $message = "The given value is not a word!";

    public function getErrorMessage(): string
    {
        return $this->message;
    }
}
