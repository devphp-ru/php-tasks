<?php
declare(strict_types=1);
error_reporting(-1);

try {
	$object = [
		new \App\solutions\t1\SomeObject('object_1'),
		new \App\solutions\t1\SomeObject('object_2'),
	];

	$factory = new \App\solutions\t1\HandleFactory();
	$factory->addHandle('object_1', function () {
		return new \App\solutions\t1\Handle\HandleObjectOne();
	});
	$factory->addHandle('object_2', function () {
		return new \App\solutions\t1\Handle\HandleObjectTwo();
	});

	$handler = new \App\solutions\t1\ObjectHandler($factory);
	$result = $handler->handleObjects($object);

	print_r($result);
	//[0] => handle_object_1
	//[1] => handle_object_2

} catch (\Exception $e) {
	echo $e->getMessage();
}
