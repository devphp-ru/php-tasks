<?php

declare(strict_types=1);

namespace App\patterns\creational\SimpleFactory\V1;

class SimpleFactory
{

    public function createBicycle(): Bicycle
    {
        return new Bicycle();
    }

}
