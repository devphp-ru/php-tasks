<?php
declare(strict_types=1);

namespace App\solutions\t3\ApiToken;

interface ApiToken
{
	public function get(): ?string;

	public function set(string $token): bool;

}
