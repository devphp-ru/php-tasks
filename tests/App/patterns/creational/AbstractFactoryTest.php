<?php
declare(strict_types=1);

namespace App\patterns\creational;

use App\patterns\creational\AbstractFactory\V1\CsvWriter;
use App\patterns\creational\AbstractFactory\V1\JsonWriter;
use App\patterns\creational\AbstractFactory\V1\UnixWriterFactory;
use App\patterns\creational\AbstractFactory\V1\WinWriterFactory;
use App\patterns\creational\AbstractFactory\V1\WriterFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    /**
     * @dataProvider providerFactory
     */
    public function testCanCreateCsvWriterOnUnix(WriterFactory $writerFactory): void
    {
        $this->assertInstanceOf(JsonWriter::class, $writerFactory->createJsonWriter());
        $this->assertInstanceOf(CsvWriter::class, $writerFactory->createCsvWriter());
    }

    public function providerFactory(): array
    {
        return [
            [new UnixWriterFactory()],
            [new WinWriterFactory()],
        ];
    }

}
