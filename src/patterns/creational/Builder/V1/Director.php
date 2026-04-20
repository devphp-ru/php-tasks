<?php

declare(strict_types=1);

namespace App\patterns\creational\Builder\V1;

class Director
{

    public function build(Builder $builder): Vehicle
    {
        $builder->createVehicle();
        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheel();

        return $builder->getVehicle();
    }

}
