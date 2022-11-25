<?php
declare(strict_types=1);

namespace App\classes;


class Generator
{
	/** @var string  */
	private static string $string = '123456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ';

	/** @var int  */
	private const MIN_LENGTH = 0;

	/** @var int  */
	private const MAX_LENGTH = 9;

	/**
	 * @return $this
	 */
	public static function create(): self
	{
		return new self();
	}

	/**
	 * вернуть сгенерированный пароль
	 *
	 * @param int $length
	 * @return string
	 */
	public function makePassword(int $length): string
	{
		return $this->generateString($length);
	}

	/**
	 * вернуть сгенерированный пин-код
	 *
	 * @param int $length
	 * @return int
	 */
	public function makePIN(int $length = 4): int
	{
		$pin = '';
		$i = 0;

		while ($i < $length) {
			$pin .= mt_rand(self::MIN_LENGTH, self::MAX_LENGTH);
			$i++;
		}

		return intval($pin);
	}

	/**
	 * вернуть случайную строку символов
	 *
	 * @param int $length
	 * @return string
	 */
	private function generateString(int $length): string
	{
		$newString = '';

		for ($i = 0; $i < $length; $i++) {
			$symbol = mt_rand(0, strlen(self::$string) - 1);
			if ($i != 0) {
				if (isset($newString[strlen($newString) - 1]) && $newString[strlen($newString) - 1] === self::$string[$symbol]) {
					$i--;
					continue;
				}
			}

			$newString .= self::$string[$symbol];
		}

		return $newString;
	}
}

/**
 * $generator = \App\classes\Generator::create();
 * $password = $generator->makePassword(10);//58qFZJ3HxI
 * echo $password . PHP_EOL;
 * $pinCode = $generator->makePIN();//3292
 * echo $pinCode;
 */