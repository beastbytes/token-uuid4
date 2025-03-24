<?php

declare(strict_types=1);

use BeastBytes\Token\TokenFactoryInterface;
use BeastBytes\Token\Uuid4\TokenFactory;

return [
    TokenFactoryInterface::class => TokenFactory::class
];