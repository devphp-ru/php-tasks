<?php

declare(strict_types=1);

namespace App\patterns\creational;

use App\patterns\creational\Builder\V1\Car;
use App\patterns\creational\Builder\V1\CarBuilder;
use App\patterns\creational\Builder\V1\Director;
use App\patterns\creational\Builder\V1\Truck;
use App\patterns\creational\Builder\V1\TruckBuilder;
use PHPUnit\Framework\TestCase;

class DirectorTest extends TestCase
{

    public function test_can_build_truck(): void
    {
        $truckBuilder = new TruckBuilder();
        $newVehicle = new Director()->build($truckBuilder);

        $this->assertInstanceOf(Truck::class, $newVehicle);
    }

    public function test_can_build_car_(): void
    {
        $carBuilder = new CarBuilder();
        $newVehicle = new Director()->build($carBuilder);

        $this->assertInstanceOf(Car::class, $newVehicle);
    }

}
