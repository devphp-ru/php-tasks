<?php
declare(strict_types=1);

namespace App\patterns\creational\AbstractFactory\V1;

//use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    /**
     * @param WriterFactory $writerFactory
     * @dataProvider provideFactory
     */
    public function testCanCreateCsvWriterOnUnix(WriterFactory $writerFactory): void
    {
        $this->assertInstanceOf(JsonWriter::class, $writerFactory->createJsonWriter());
        $this->assertInstanceOf(CsvWriter::class, $writerFactory->createCsvWriter());
    }

    public function provideFactory(): array
    {
        return [
            [new UnixWriterFactory()],
            [new WinWriterFactory()],
        ];
    }

}