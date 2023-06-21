<?php
declare(strict_types=1);

namespace App\solutions\t1;

use App\solutions\t1\Contracts\Handle;

class HandleFactory
{
	private array $callbacks = [];

	/**
	 * Тут не уточняю тип Handle обработчика, так как такой подход дает больше гибкости
	 * при использовании другой группы обработчиков
	 *
	 * @param string $type
	 * @param callable $callback
	 */
	public function addHandle(string $type, callable $callback): void
	{
		$this->callbacks[$type] = $callback();
	}

	public function createHandle(string $type): Handle
	{
		if (empty($this->callbacks[$type])) {
			throw new \InvalidArgumentException('Incorrect parameter type.');
		}

		return $this->callbacks[$type];
	}
}
