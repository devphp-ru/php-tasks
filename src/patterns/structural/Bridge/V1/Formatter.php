<?php

declare(strict_types=1);

namespace App\patterns\structural\Bridge\V1;

interface Formatter
{

    public function format(string $text): string;

}
