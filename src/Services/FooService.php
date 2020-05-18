<?php

declare(strict_types=1);

namespace App\Services;

final class FooService implements FooServiceInterface
{
    public function foo(): string
    {
        return 'foo';
    }
}
