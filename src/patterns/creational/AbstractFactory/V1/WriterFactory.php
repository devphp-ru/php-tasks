<?php
declare(strict_types=1);

namespace App\patterns\creational\AbstractFactory\V1;

interface WriterFactory
{
    public function createCsvWriter(): CsvWriter;
    public function createJsonWriter(): JsonWriter;
}
