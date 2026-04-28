<?php

declare(strict_types=1);

namespace App\patterns\creational;

use App\patterns\creational\SimpleFactory\V1\Bicycle;
use App\patterns\creational\SimpleFactory\V1\SimpleFactory;
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{

    public function test_create_bicycle(): void
    {
        $bicycle = new SimpleFactory()->createBicycle();

        $this->assertInstanceOf(Bicycle::class, $bicycle);
    }

}
