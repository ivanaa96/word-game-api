<?php

namespace App\Domain\Base;

interface DomainException
{
    public function getErrorMessage(): string;
}
