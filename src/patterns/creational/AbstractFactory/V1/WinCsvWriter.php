<?php
declare(strict_types=1);

namespace App\patterns\creational\AbstractFactory\V1;

class WinCsvWriter implements CsvWriter
{
    public function write(array $line): string
    {
        return \implode(' ', $line);
    }
}
