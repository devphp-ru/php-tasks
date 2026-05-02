<?php

declare(strict_types=1);

namespace App\patterns\creational\StaticFactory\V1;

class FormatString implements Formatter
{

    public function format(string $input): string
    {
        return $input;
    }

}
