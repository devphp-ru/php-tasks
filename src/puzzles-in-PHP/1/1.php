<?php

/**
 * Количество и имена файлов в произвольном каталоге
 */
echo mb_convert_encoding (htmlspecialchars(`dir`), 'UTF-8');

/**
 * Смена кодировки при помощи системной команды chcp
 */
`chcp 1251`;
echo htmlspecialchars(`dir`);
`chcp UTF-8`;
echo htmlspecialchars(`dir`);

/**
 * Вывод содержимого каталога с использованием команды dir
 */
$content = `dir`;
$data = explode("\n", $content);

foreach ($data as $value) {
	if (!strpos($value, "<DIR>")) {
		preg_match("#([-\d\w._]+\.[-\d\w._]+)$#i", $value, $matches);
		if (!empty($matches[1])) {
			$fileName[] = $matches[1];
		}
	}
}

echo 'Число файлов - ' . count($fileName) . PHP_EOL;
sort($fileName);

foreach ($fileName as $value) {
	echo $value . PHP_EOL;
}

/**
 * Работа с определителями типа
 */
for ($i = 1; $i <= mt_rand(1, 100); $i++) {
	echo $i . ', ';
}

/**
 * Работа с определителями типа
 */
$number = 5867;
printf("Двоичное число: %b\n", $number);
printf("ASCII-эквивалент: %c\n", $number);
printf("Десятичное число: %d\n", $number);
printf("Число с плавающей точкой: %f\n", $number);
printf("Восьмеричное число: %o\n", $number);
printf("Строковое представление: %s\n", $number);
printf("Шестнадцатеричное число (нижний регистр): %x\n", $number);
printf("Шестнадцатеричное число (верхний регистр): %X\n", $number);

/**
 * Форматирование числового вывода
 */
$number = 45;
printf("%5d\n", $number);
printf("%05d\n", $number);

/**
 * Форматирование чисел с плавающей точкой
 */
$number = 12.927789;
printf("%8.2f\n",$number);
printf("%.2f\n", $number);

/**
 * Форматирование строкового вывода
 */
$files = [
	'all.php', 'auth.php',
	'auth.txt', 'base.txt',
	'chat.html', 'config.php',
	'count.txt', 'count_new.txt',
	'counter.dat', 'counter.php',
	'create.php', 'dat.db',
];
foreach ($files as $value) {
	printf("%20s\n", $value);
}

/**
 * Выравнивание имен файлов по правому краю
 */
$files = [
	'all.php', 'auth.php',
	'auth.txt', 'base.txt',
	'chat.html', 'config.php',
	'count.txt', 'count_new.txt',
	'counter.dat', 'counter.php',
	'create.php', 'dat.db',
];
$maxLength = 0;
foreach ($files as $value) {
	$length = mb_strlen($value);
	if ($length > $maxLength) {
		$maxLength = $length;
	}
}
foreach ($files as $value) {
	printf("%{$maxLength}s\n", $value);
}

/**
 * Выравнивание по левому и правому краям
 */
$files = [
	'all.php', 'auth.php',
	'auth.txt', 'base.txt',
	'chat.html', 'config.php',
	'count.txt', 'count_new.txt',
	'counter.dat', 'counter.php',
	'create.php', 'dat.db',
];
$total = count($files);
$half = ($total / 2);
$maxLengthFirst = 0;
for ($i = 0; $i < $half; $i++) {
	$length = mb_strlen($files[$i]);
	if ($length > $maxLengthFirst) {
		$maxLengthFirst = $length;
	}
}

$maxLengthSecond = 0;
for ($i = $half; $i < $total; $i++) {
	$length = mb_strlen($files[$i]);
	if ($length > $maxLengthSecond) {
		$maxlengthSecond = $length;
	}
}

for ($i = 0; $i < $half; $i++) {
	printf(
		$files[$i]
		. str_repeat(' ', ($maxLengthFirst - mb_strlen($files[$i])))
		. "%{$maxLengthSecond}s\n",
		$files[$half + $i]
	);
}

/**
 * Вывод таблицы с тремя столбцами по первому варианту
 */
$files = [
	'all.php', 'auth.php',
	'auth.txt', 'base.txt',
	'chat.html', 'config.php',
	'count.txt', 'count_new.txt',
	'counter.dat', 'counter.php',
	'create.php', 'dat.db',
];
$n = count($files);
$numCols = 3;
$counter = 0;
echo '<table border="1">';
for ($i = 0; $i < $n; $i++) {
	if ($counter === 0) {
		echo '<tr>';
	}

	if ($counter === $numCols) {
		echo '</tr>';
		$counter = 0;
	}
	echo "<td>{$files[$i]}</td>";
	$counter++;
}
echo '</table>';
