<?php
declare(strict_types=1);

namespace App\solutions\t2;

use App\solutions\t2\Contracts\HttpService;

class Http
{
	public function __construct(private readonly HttpService $service) {}

	public function get(string $url, array $options = []): void
	{
		$this->service->request($url, 'GET', $options);
	}

	public function post(string $url): void
	{
		//явно указываю агрумент который по умолчанию, придает читаемость и понимание
		$this->service->request($url, 'GET', []);
	}
}
