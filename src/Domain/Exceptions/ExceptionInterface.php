<?php

namespace App\Domain\Exceptions;

interface ExceptionInterface
{
    public function getErrorMessage(): string;
}
