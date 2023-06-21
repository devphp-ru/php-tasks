<?php
declare(strict_types=1);

namespace App\solutions\t3;

class Request
{
	//тут private но сделал public
	public function __construct(
		public string $method,
		public string $url,
		public array $params = []
	){}

	public function getParams(): array
	{
		return [
			'method' => $this->method,
			'url' => $this->url,
			'params' => $this->params,
		];
	}

}
