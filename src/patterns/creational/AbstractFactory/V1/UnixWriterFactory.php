<?php
declare(strict_types=1);

namespace App\patterns\creational\AbstractFactory\V1;

class UnixWriterFactory implements WriterFactory
{
    public function createCsvWriter(): CsvWriter
    {
        return new UnixCsvWriter();
    }

    public function createJsonWriter(): JsonWriter
    {
        return new UnixJsonWriter();
    }

}
