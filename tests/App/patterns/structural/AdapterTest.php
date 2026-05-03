<?php

declare(strict_types=1);

namespace App\patterns\structural;

use App\patterns\structural\Adapter\V1\EBookAdapter;
use App\patterns\structural\Adapter\V1\Kindle;
use App\patterns\structural\Adapter\V1\PaperBook;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{

    public function test_can_turn_page_on_book(): void
    {
        $book = new PaperBook();
        $book->open();
        $book->turnPage();

        $this->assertSame(2, $book->getPage());
    }

    public function test_can_turn_page_on_kindle_in_a_normal_book(): void
    {
        $kindle = new Kindle();
        $book = new EBookAdapter($kindle);

        $book->open();
        $book->turnPage();

        $this->assertSame(2, $book->getPage());
    }

}
