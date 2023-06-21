<?php
declare(strict_types=1);

namespace App\solutions\t2\Contracts;

interface HttpService
{
	public function request(string $url, string $method, array $options = []): void;
}
