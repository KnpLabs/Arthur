<?php

declare(strict_types=1);

namespace App\Domain\Exception;

use Exception;
use LogicException;

final class NoFreeHorse extends LogicException
{
    public function __construct(
        string $message     = 'No free horse in the stable.',
        int $code           = 0,
        Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
