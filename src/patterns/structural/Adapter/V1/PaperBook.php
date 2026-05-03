<?php

declare(strict_types=1);

namespace App\patterns\structural\Adapter\V1;

class PaperBook implements Book
{

    private int $page;

    public function turnPage(): void
    {
        $this->page++;
    }

    public function open(): void
    {
        $this->page = 1;
    }

    public function getPage(): int
    {
        return $this->page;
    }

}
