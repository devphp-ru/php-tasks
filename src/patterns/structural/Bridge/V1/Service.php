<?php

declare(strict_types=1);

namespace App\patterns\structural\Bridge\V1;

abstract class Service
{

    public function __construct(protected Formatter $implementation) {}

    abstract public function get(): string;

    final public function setImplementation(Formatter $printer): void
    {
        $this->implementation = $printer;
    }

}
