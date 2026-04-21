<?php

declare(strict_types=1);

namespace App\patterns\creational\FactoryMethod;

class FileLogger implements Logger
{

    public function __construct(private readonly string $filePath) {}

    public function log(string $message): void
    {
        file_put_contents($this->filePath, $message, FILE_APPEND);
    }

}
