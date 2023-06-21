<?php
declare(strict_types=1);

namespace App\solutions\t1;

use App\solutions\t1\Contracts\Handler;

class ObjectHandler implements Handler
{
	public function __construct(private HandleFactory $handleFactory){}

	public function handleObjects(array $objects): array
	{
		$handlers = [];

		foreach ($objects as $object) {
			//тут можно получить как объект, или вывзать метод напрямую, или вызвать из фабрики все зависит от задачи
			//$handlers[] = $this->handleFactory->createHandle($object->getObjectName());
			$handlers[] = $this->handleFactory->createHandle($object->getObjectName())->handle();
		}

		return $handlers;
	}
}
