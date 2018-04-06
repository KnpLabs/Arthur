<?php

namespace App\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use App\Domain\Model;

class Horse implements NormalizerInterface
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
