<?php

declare(strict_types=1);

namespace App\patterns\creational\SimpleFactory\V1;

class Bicycle
{

    public function driveTo(string $destination): string
    {
        return 'method driveTo';
    }

}
