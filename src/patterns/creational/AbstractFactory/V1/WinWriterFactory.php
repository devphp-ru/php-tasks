<?php
declare(strict_types=1);

namespace App\patterns\creational\AbstractFactory\V1;

class WinWriterFactory implements WriterFactory
{
    public function createCsvWriter(): CsvWriter
    {
        return new WinCsvWriter();
    }

    public function createJsonWriter(): JsonWriter
    {
        return new WinJsonWriter();
    }

}
