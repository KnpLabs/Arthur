<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Domain\Model;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class Horse implements NormalizerInterface
{
    public function normalize($object, $format = null, array $context = [])
    {
        return [
            'name' => $object->getName(),
        ];
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Model\Horse;
    }
}
