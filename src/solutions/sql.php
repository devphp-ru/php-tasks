<?php
declare(strict_types=1);
error_reporting(-1);

$dbh = new \PDO(
	'mysql:host=localhost;dbname=db-goods;charset=utf8mb4',
	'root',
	'', [
		\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
	]
);

//5 В базе данных имеется таблица с товарами goods (id INTEGER, name TEXT),
// таблица с тегами tags (id INTEGER, name TEXT)
// и таблица связи товаров и тегов goods_tags (tag_id INTEGER, good_id INTEGER, UNIQUE(tag_id, good_id)).
// Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе.

$query = 'SELECT goods.id,goods.name FROM goods INNER JOIN goods_tags ON goods_tags.good_id=goods.id';

$sth = $dbh->prepare($query);
$sth->execute();
$result = $sth->fetchAll();
print_r($result);

//6 Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины,
// и все они (каждый) поставили высокую оценку (строго выше 5).

$query = 'SELECT department_id FROM evaluations WHERE gender = true AND value > 5';

$sth = $dbh->prepare($query);
$sth->execute();
$result = $sth->fetchAll();
print_r($result);
