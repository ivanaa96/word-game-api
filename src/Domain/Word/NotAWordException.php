<?php

namespace App\Domain\Word;

use App\Domain\Base\DomainException;
use Exception;

class NotAWordException extends Exception implements DomainException
{
    protected $message = "The given value is not a word!";

    public function getErrorMessage(): string
    {
        return $this->message;
    }
}
