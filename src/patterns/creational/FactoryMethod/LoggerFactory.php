<?php

declare(strict_types=1);

namespace App\patterns\creational\FactoryMethod;

interface LoggerFactory
{

    public function createLogger(): Logger;

}
