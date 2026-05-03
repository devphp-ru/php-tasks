<?php

declare(strict_types=1);

namespace App\patterns\structural\Adapter\V1;

class Kindle implements EBook
{

    private int $page = 1;
    private int $totalPages = 100;

    public function unlock(): void
    {
        // TODO: Implement unlock() method.
    }

    public function pressNext(): void
    {
        $this->page++;
    }

    public function getPage(): array
    {
        return [
            $this->page,
            $this->totalPages,
        ];
    }

}
