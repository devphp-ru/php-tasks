<?php
declare(strict_types=1);

namespace App\solutions\t1\Contracts;

interface Handler
{
	public function handleObjects(array $objects): array;
}
