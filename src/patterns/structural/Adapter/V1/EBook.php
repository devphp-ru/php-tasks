<?php

declare(strict_types=1);

namespace App\patterns\structural\Adapter\V1;

interface EBook
{

    public function unlock(): void;

    public function pressNext(): void;

    public function getPage(): array;

}
