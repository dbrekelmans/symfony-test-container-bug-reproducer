<?php

declare(strict_types=1);

namespace App\Services;

final class BarService
{
    /**
     * @var FooServiceInterface
     */
    private $fooService;

    public function __construct(FooServiceInterface $fooService)
    {
        $this->fooService = $fooService;
    }
}
