<?php

declare(strict_types=1);

namespace App\patterns\creational\Builder\V1;

class TruckBuilder implements Builder
{

    private Truck $truck;

    public function createVehicle(): void
    {
        $this->truck = new Truck();
    }

    public function addWheel(): void
    {
        $this->truck->setPart('wheel1', new Wheel());
        $this->truck->setPart('wheel2', new Wheel());
        $this->truck->setPart('wheel3', new Wheel());
        $this->truck->setPart('wheel4', new Wheel());
        $this->truck->setPart('wheel5', new Wheel());
        $this->truck->setPart('wheel6', new Wheel());
    }

    public function addEngine(): void
    {
        $this->truck->setPart('engine', new Engine());
    }

    public function addDoors(): void
    {
        $this->truck->setPart('rightDoor', new Door());
        $this->truck->setPart('leftDoor', new Door());
    }

    public function getVehicle(): Vehicle
    {
        return $this->truck;
    }

}
