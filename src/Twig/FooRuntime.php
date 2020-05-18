<?php

declare(strict_types=1);

namespace App\Twig;

use App\Services\FooServiceInterface;
use Twig\Extension\RuntimeExtensionInterface;

final class FooRuntime implements RuntimeExtensionInterface
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
