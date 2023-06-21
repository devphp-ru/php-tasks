<?php
declare(strict_types=1);

namespace App\solutions\t3\CuzzleHttp;

use App\solutions\t3\Request;
use App\solutions\t3\Response;

class Client
{
	private Request $request;

	public function sendAsync(Request $request): self
	{
		$this->request = $request;

		return $this;
	}

	public function then(\Closure $body): Promise
	{
		return new Promise(array_merge($this->request->getParams(), ['body' => $body(new Response())]));
	}

}
