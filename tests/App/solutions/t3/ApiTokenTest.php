<?php
declare(strict_types=1);

namespace App\solutions\t3;

use App\solutions\t3\ApiToken\FileToken;
use PHPUnit\Framework\TestCase;

class ApiTokenTest extends TestCase
{
	public function testSaveAndGetApiTokenFromFile(): void
	{
		$token = new FileToken();

		$stringToken = '1b78b76715687aa3584f80fc9d80df40ee7942b9c5ca9e5cbed0d653fb63839f';
		$result = $token->set($stringToken);
		$this->assertTrue($result);

		$userToken = $token->get();
		$this->assertSame($stringToken, $userToken);

	}
}
