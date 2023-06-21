<?php
declare(strict_types=1);

namespace App\solutions\t3\CuzzleHttp;

class Promise
{
	public function __construct(public array $params) {}

	public function wait(): void
	{
		var_dump($this->params);
		// TODO: Implement wait() method.
	}

}
