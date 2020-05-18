<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\FooServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class DefaultController extends AbstractController
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
