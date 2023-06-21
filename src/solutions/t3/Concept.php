<?php
declare(strict_types=1);

namespace App\solutions\t3;

use App\solutions\t3\ApiToken\ApiToken;
use App\solutions\t3\ApiToken\DBToken;
use App\solutions\t3\ApiToken\FileToken;
use App\solutions\t3\ApiToken\RedisToken;
use App\solutions\t3\CuzzleHttp\Client;

class Concept
{
	public const FILE_TOKEN = 'file_token';
	public const DB_TOKEN = 'db_token';
	public const REDIS_TOKEN = 'redis_token';

	private Client $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function getUserData(string $apiNameKey)
	{
		$params = [
			'auth' => ['user', 'password'],
			'token' => $this->getSecretKey($apiNameKey),
		];

		$request = new Request('GET', 'https://api.method', $params);
		$promise = $this->client->sendAsync($request)->then(function ($response) {
			$result = $response->getBody();

			return $result;
		});

		$promise->wait();
	}

	private function getSecretKey(string $tokenName): ?string
	{
		return $this->getToken($tokenName)->get();
	}

	public function getToken(string $tokenName): ApiToken
	{
		return match ($tokenName) {
			self::FILE_TOKEN => new FileToken(),
			self::DB_TOKEN => new DBToken(),
			self::REDIS_TOKEN => new RedisToken(),
		};
	}

}
