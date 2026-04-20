<?php

declare(strict_types=1);

namespace App\patterns\creational\Builder\V1;

class CarBuilder implements Builder
{

    private Car $car;

    public function createVehicle(): void
    {
        $this->car = new Car();
    }

    public function addWheel(): void
    {
        $this->car->setPart('wheel1', new Wheel());
        $this->car->setPart('wheel2', new Wheel());
        $this->car->setPart('wheel3', new Wheel());
        $this->car->setPart('wheel4', new Wheel());
    }

    public function addEngine(): void
    {
        $this->car->setPart('engine', new Engine());
    }

    public function addDoors(): void
    {
        $this->car->setPart('rightDoor', new Door());
        $this->car->setPart('leftDoor', new Door());
    }

    public function getVehicle(): Vehicle
    {
        return $this->car;
    }

}
