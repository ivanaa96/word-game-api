<?php

namespace App\Domain\Dictionary;

use App\Domain\Base\DomainException;
use Exception;

class NotEnglishWordException extends Exception implements DomainException
{
    protected $message = "Given word is not in the english dictionary!";

    public function getErrorMessage(): string
    {
        return $this->message;
    }
}
