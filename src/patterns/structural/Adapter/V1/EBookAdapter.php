<?php

declare(strict_types=1);

namespace App\patterns\structural\Adapter\V1;

class EBookAdapter implements Book
{

    public function __construct(protected EBook $eBook) {}

    public function turnPage(): void
    {
        $this->eBook->pressNext();
    }

    public function open(): void
    {
        $this->eBook->unlock();
    }

    public function getPage(): int
    {
        return $this->eBook->getPage()[0];
    }

}