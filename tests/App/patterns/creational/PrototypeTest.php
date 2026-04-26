<?php

declare(strict_types=1);

namespace App\patterns\creational;

use App\patterns\creational\Prototype\V1\BarBookPrototype;
use App\patterns\creational\Prototype\V1\FooBookPrototype;
use PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase
{
    public function test_can_get_bar_and_foo_book(): void
    {
        $fooPrototype = new FooBookPrototype();
        $barPrototype = new BarBookPrototype();

        for ($i = 0; $i < 10; $i++) {
            $book = clone $fooPrototype;
            $book->setTitle('Foo Book ' . $i);
            $this->assertInstanceOf(FooBookPrototype::class, $book);
        }

        for ($i = 0; $i < 10; $i++) {
            $book = clone $barPrototype;
            $book->setTitle('Bar Book ' . $i);
            $this->assertInstanceOf(BarBookPrototype::class, $book);
        }
    }

}
