<?php

declare(strict_types=1);

namespace App\patterns\creational;

use InvalidArgumentException;
use App\patterns\creational\StaticFactory\V1\FormatNumber;
use App\patterns\creational\StaticFactory\V1\FormatString;
use App\patterns\creational\StaticFactory\V1\StaticFactory;
use PHPUnit\Framework\TestCase;

class StaticFactoryTest extends TestCase
{

    public function test_can_create_number_formatter(): void
    {
        $this->assertInstanceOf(FormatNumber::class, StaticFactory::factory('number'));
    }

    public function test_can_create_string_formatter(): void
    {
        $this->assertInstanceOf(FormatString::class, StaticFactory::factory('string'));
    }

    public function test_exception(): void
    {
        $this->expectException(InvalidArgumentException::class);

        StaticFactory::factory('array');
    }

}
