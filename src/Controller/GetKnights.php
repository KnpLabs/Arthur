<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Domain\Task\ListKnights;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetKnights
{
    /**
     * @var ListKnights
     */
    private $listKnights;

    /**
     * @var NormalizerInterface
     */
    private $normalizer;

    public function __construct(ListKnights $listKnights, NormalizerInterface $normalizer)
    {
        $this->listKnights = $listKnights;
        $this->normalizer = $normalizer;
    }

    public function __invoke(Request $request): Response
    {
        return new JsonResponse(
            $this->normalizer->normalize(($this->listKnights)())
        );
    }
}
