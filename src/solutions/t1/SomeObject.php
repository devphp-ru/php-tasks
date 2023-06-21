<?php
declare(strict_types=1);

namespace App\solutions\t1;

use App\solutions\t1\Contracts\BaseObject;

class SomeObject implements BaseObject
{
	public function __construct(private string $name) {}

	public function getObjectName(): string
	{
		return $this->name;
	}
}
