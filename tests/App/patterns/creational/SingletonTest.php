<?php

declare(strict_types=1);

namespace App\patterns\creational;

use App\patterns\creational\Singleton\V1\Singleton;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{

    public function test_uniqueness(): void
    {
        $firstCall = Singleton::getInstance();
        $secondCall = Singleton::getInstance();

        $this->assertInstanceOf(Singleton::class, $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }

}
