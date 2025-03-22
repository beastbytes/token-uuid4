<?php

declare(strict_types=1);

namespace BeastBytes\Token\Uuid4;

use BeastBytes\Token\TokenFactoryInterface;
use Ramsey\Uuid\Uuid;

final class TokenFactory implements TokenFactoryInterface
{
    public function createToken(): string
    {
        return (string) Uuid::uuid4();
    }
}