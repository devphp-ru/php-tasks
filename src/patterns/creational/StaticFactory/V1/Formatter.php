<?php

declare(strict_types=1);

namespace App\patterns\creational\StaticFactory\V1;

interface Formatter
{
    public function format(string $input): string;

}
