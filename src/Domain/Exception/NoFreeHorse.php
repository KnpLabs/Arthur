<?php

namespace App\Domain\Exception;

use LogicException;
use Exception;

class NoFreeHorse extends LogicException
{
    public function __construct(
        string $message = 'No free horse in the stable.',
        int $code = 0,
        Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
