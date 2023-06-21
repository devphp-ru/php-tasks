<?php
declare(strict_types=1);

namespace App\solutions\t3\ApiToken;

class RedisToken implements ApiToken
{
	private \Redis $redis;

	public function __construct()
	{
		$this->redis = new \Redis([
			'host' => '127.0.0.1',
			'port' => 6379,
			'connectTimeout' => 2.5,
			'auth' => ['phpredis', 'phpredis'],
			'ssl' => ['verify_peer' => false],
			'backoff' => [
				'algorithm' => Redis::BACKOFF_ALGORITHM_DECORRELATED_JITTER,
				'base' => 500,
				'cap' => 750,
			],
		]);
	}

	public function get(): ?string
	{
		return $this->redis->get('key') ?? '';
	}

	public function set(string $token): bool
	{
		return $this->redis->set('key', $token);
	}

}
