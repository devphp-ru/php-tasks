<?php

declare(strict_types=1);

namespace App\patterns\structural\Bridge\V1;

class PlainTextFormatter implements Formatter
{

    public function format(string $text): string
    {
        return $text;
    }

}
