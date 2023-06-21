<?php
declare(strict_types=1);

namespace App\solutions\t3\ApiToken;

class FileToken implements ApiToken
{
	private string $filePath = '/storage_api_key.txt';

	public function get(): ?string
	{
		$result = file_get_contents(__DIR__ . $this->filePath);

		return $result !== false ? $result : null;
	}

	public function set(string $token): bool
	{
		return (bool)\file_put_contents(__DIR__ . $this->filePath, $token);
	}

}
