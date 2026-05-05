<?php

declare(strict_types=1);

namespace App\patterns\structural\Bridge\V1;

class HtmlFormatter implements Formatter
{

    public function format(string $text): string
    {
        return sprintf('<p>%s</p>', $text);
    }

}
