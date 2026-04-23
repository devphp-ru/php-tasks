<?php

declare(strict_types=1);

namespace App\patterns\creational\Pool;

final class StringReverseWorker
{

    public function run(string $value): string
    {
        return strrev($value);
    }

}
