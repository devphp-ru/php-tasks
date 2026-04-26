<?php

declare(strict_types=1);

namespace App\patterns\creational\Prototype\V1;

class BarBookPrototype extends BookPrototype
{
    protected string $category = 'Bar';

    public function __clone() {}

}
