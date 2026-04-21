<?php

declare(strict_types=1);

namespace App\patterns\creational\FactoryMethod;

class FileLoggerFactory implements LoggerFactory
{

    public function __construct(private readonly string $filePath) {}

    public function createLogger(): Logger
    {
        return new FileLogger($this->filePath);
    }

}
