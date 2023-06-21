<?php
declare(strict_types=1);

namespace App\solutions\t2;

use App\solutions\t2\Contracts\HttpService;

class XMLHttpRequestService implements HttpService
{
	public function request(string $url, string $method, array $options = []): void
	{
		// TODO: Implement request() method.
	}
}
