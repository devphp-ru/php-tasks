<?php
declare(strict_types=1);

namespace App\solutions\t1;

use App\solutions\t1\Handle\HandleObjectOne;
use App\solutions\t1\Handle\HandleObjectTwo;
use PHPUnit\Framework\TestCase;

class ObjectHandlerTest extends TestCase
{
	/**
	 * Практика 1
	 */
	public function testCanCreateHandlers(): void
	{
		$object = [
			new SomeObject('object_1'),
			new SomeObject('object_2'),
		];

		$factory = new HandleFactory();
		$factory->addHandle('object_1', function () {
			return new HandleObjectOne();
		});
		$factory->addHandle('object_2', function () {
			return new HandleObjectTwo();
		});

		$handler = new ObjectHandler($factory);
		$result = $handler->handleObjects($object);

		$expect = [
			'handle_object_1',
			'handle_object_2',
		];

		$this->assertSame($expect, $result);
	}
}
