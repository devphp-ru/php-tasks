<?php
declare(strict_types=1);

namespace App\patterns\creational\AbstractFactory\V1;

class UnixJsonWriter implements JsonWriter
{
    public function write(array $line, bool $formatted = true): string
    {
        $options = 0;

        if ($formatted) {
            $options = JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT;
        }

        return json_encode($line, $options);
    }

}
