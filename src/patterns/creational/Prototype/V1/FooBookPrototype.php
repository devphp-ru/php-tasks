<?php

declare(strict_types=1);

namespace App\patterns\creational\Prototype\V1;

class FooBookPrototype extends BookPrototype
{
    protected string $category = 'Foo';

    public function __clone() {}

}
