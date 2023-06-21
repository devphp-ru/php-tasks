<?php
declare(strict_types=1);

namespace App\solutions\t3\ApiToken;

class DBToken implements ApiToken
{
	private \PDO $dbh;

	public function __construct()
	{
		try {
			$this->dbh = new \PDO(
				'mysql:host=localhost;dbname=db-tt;charset=utf8mb4',
				'root',
				'', [
					\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
					\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
					\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
				]
			);
		} catch (\PDOException $e) {
			throw new \InvalidArgumentException('Server error',500);
		}
	}

	public function get(): ?string
	{
		$query = 'SELECT token FROM tokens ORDER BY id DESC LIMIT 1';
		$sth = $this->dbh->prepare($query);
		$sth->execute();
		$result = $sth->fetch();

		return $result !== false ? $result['token'] : null;
	}

	public function set(string $token): bool
	{
		$query = 'INSERT INTO tokens (token) VALUES (:token)';
		$sth = $this->dbh->prepare($query);
		$sth->execute([':token', $token]);
		$result = $sth->rowCount();

		return (bool)$result;
	}

}
