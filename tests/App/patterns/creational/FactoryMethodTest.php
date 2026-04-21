<?php

declare(strict_types=1);

namespace App\patterns\creational;

use App\patterns\creational\FactoryMethod\FileLogger;
use App\patterns\creational\FactoryMethod\FileLoggerFactory;
use App\patterns\creational\FactoryMethod\StdoutLogger;
use App\patterns\creational\FactoryMethod\StdoutLoggerFactory;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{

    public function test_can_create_stdoutLogging(): void
    {
        $logger = new StdoutLoggerFactory()->createLogger();

        $this->assertInstanceOf(StdoutLogger::class, $logger);
    }

    public function test_can_create_fileLogging(): void
    {
        $logger = new FileLoggerFactory(sys_get_temp_dir())->createLogger();

        $this->assertInstanceOf(FileLogger::class, $logger);
    }

}
