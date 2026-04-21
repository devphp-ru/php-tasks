<?php

declare(strict_types=1);

namespace App\patterns\creational\FactoryMethod;

interface Logger
{

    public function log(string $message): void;

}
