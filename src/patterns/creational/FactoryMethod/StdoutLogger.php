<?php

declare(strict_types=1);

namespace App\patterns\creational\FactoryMethod;

class StdoutLogger implements Logger
{

    public function log(string $message): void
    {
        echo $message;
    }

}
