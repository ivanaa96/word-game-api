<?php

namespace App\Domain\Dictionary;

use App\Domain\Exceptions\ExceptionInterface;
use Exception;

class NotEnglishWordException extends Exception implements ExceptionInterface
{
    protected $message = "Given word is not in the english dictionary!";

    public function getErrorMessage(): string
    {
        return $this->message;
    }
}
