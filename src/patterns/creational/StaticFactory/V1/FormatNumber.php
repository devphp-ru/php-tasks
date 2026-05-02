<?php

declare(strict_types=1);

namespace App\patterns\creational\StaticFactory\V1;

class FormatNumber implements Formatter
{

    public function format(string $input): string
    {
        return number_format((int) $input);
    }

}
