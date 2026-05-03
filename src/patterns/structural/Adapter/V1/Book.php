<?php

declare(strict_types=1);

namespace App\patterns\structural\Adapter\V1;

interface Book
{

    public function turnPage(): void;

    public function open(): void;

    public function getPage(): int;

}
