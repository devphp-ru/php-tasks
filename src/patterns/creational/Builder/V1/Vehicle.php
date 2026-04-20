<?php

declare(strict_types=1);

namespace App\patterns\creational\Builder\V1;

abstract class Vehicle
{

    final public function setPart(string $key, object $value): void {}

}
