<?php
declare(strict_types=1);

namespace App\patterns\creational\AbstractFactory\V1;

interface JsonWriter
{
    public function write(array $line): string;
}
