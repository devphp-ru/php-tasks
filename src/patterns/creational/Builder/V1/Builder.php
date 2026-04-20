<?php

declare(strict_types=1);

namespace App\patterns\creational\Builder\V1;

interface Builder
{

    public function createVehicle(): void;

    public function addWheel(): void;

    public function addEngine(): void;

    public function addDoors(): void;

    public function getVehicle(): Vehicle;

}
