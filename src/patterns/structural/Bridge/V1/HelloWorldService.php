<?php

declare(strict_types=1);

namespace App\patterns\structural\Bridge\V1;

class HelloWorldService extends Service
{

    public function get(): string
    {
        return $this->implementation->format('Hello world');
    }

}
