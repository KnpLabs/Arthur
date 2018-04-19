<?php

declare(strict_types=1);

namespace App\Controller;

use App\Domain\Task\ListKnights;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class GetKnights
{
    /**
     * @var ListKnights
     */
    private $listKnights;

    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    public function __construct(
        ListKnights $listKnights,
        NormalizerInterface $normalizer
    ) {
        $this->listKnights = $listKnights;
        $this->normalizer  = $normalizer;
    }

    public function __invoke(Request $request): Response
    {
        return new JsonResponse(
            $this->normalizer->normalize(($this->listKnights)())
        );
    }
}
