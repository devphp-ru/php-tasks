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

/**
 * Вывод таблицы с тремя столбцами по второму варианту
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
$number = (int)($n / $numCols);
if ((float)($n / $numCols) - $number != 0) {
	$number++;
}

$arr = [];
for ($i = 0; $i < $number; $i++) {
	for ($j = 0; $j < $numCols; $j++) {
		$arr[$i][$j] = $files[$j * $number + $i];
	}
}

echo '<table border="1">';
for ($i = 0; $i < $number; $i++) {
	echo '<tr>';
	for ($j = 0; $j < $numCols; $j++) {
		echo "<td>{$arr[$i][$j]}</td>";
	}
	echo '</tr>';
}
echo '</table>';

/**
 * Передача массива методом GET
 */
$files = [
	'all.php', 'auth.php',
	'auth.txt', 'base.txt',
	'chat.html', 'config.php',
	'count.txt', 'count_new.txt',
	'counter.dat', 'counter.php',
	'create.php', 'dat.db',
];
$url = implode('&files[]=', $files);
$url = 'file.php?files[]=' . $url;
echo "<a href=\"{$url}\">Отправить</a>";
//file.php
echo '<pre>';
print_r($_GET);
echo '</pre>';

/**
 * HTML-форма для отправки данных методом POST
 */
$files = [
	'all.php', 'auth.php',
	'auth.txt', 'base.txt',
	'chat.html', 'config.php',
	'count.txt', 'count_new.txt',
	'counter.dat', 'counter.php',
	'create.php', 'dat.db',
];
/*
<form action="file.php" method="post">
	<?php foreach ($files as $value): ?>
		<input type="hidden" name="files[]" value="<?php echo $value; ?>">
	<?php endforeach; ?>
	<input type="submit" value="Отправить">
</form>
*/
//file.php
echo '<pre>';
print_r($_POST);
echo '</pre>';

/**
 * Использование сессий для передачи массива
 */
session_start();
$files = [
	'all.php', 'auth.php',
	'auth.txt', 'base.txt',
	'chat.html', 'config.php',
	'count.txt', 'count_new.txt',
	'counter.dat', 'counter.php',
	'create.php', 'dat.db',
];
unset($_SESSION['filename']);
foreach ($files as $value) {
	$_SESSION['filename'][] = $value;
}
echo "<a href='file.php'>link</a>";
//file.php
session_start();
echo '<pre>';
print_r($_SESSION['filename']);
echo '</pre>';

/**
 * Использование cookie для передачи массива
 */
$files = [
	'all.php', 'auth.php',
	'auth.txt', 'base.txt',
	'chat.html', 'config.php',
	'count.txt', 'count_new.txt',
	'counter.dat', 'counter.php',
	'create.php', 'dat.db',
];
session_start();
$content = serialize($files);
setcookie('filename', $content, time() + 3600);
echo "<a href='file.php'>link</a>";
//file.php
session_start();
$files = unserialize(stripcslashes($_COOKIE['filename']));
echo '<pre>';
print_r($files);
echo '</pre>';

/**
 * Вертикальный вывод строки
 */
$string = 'Hello world!';
$arr = str_split($string);
foreach ($arr as $value) {
	echo $value . PHP_EOL;
}

/**
 * Альтернативный способ вертикального вывода
 */
$string = 'Hello world!';
$n = strlen($string);
for ($i = 0; $i < $n; $i++) {
	echo $string[$i] . PHP_EOL;
}

/**
 * Число в денежном формате
 */
$price = 18439529234.5678;
echo number_format($price, 2, '.', ',');

/**
 * Упаковка IP-адреса в число
 */
function myIp2Long(string $ip): int
{
	$a = explode('.', $ip);
	return 256 * 256 * 256 * $a[0]
		+ 256 * 256 * $a[1]
		+ 256 * $a[2]
		+ $a[3];
}
$ip = '127.0.0.1';
$number = ip2Long($ip);
echo $number;

/**
 * Восстановление IP-адреса из целого числа
 */
function myLong2Ip(int $number): string
{
	$a = [];
	for ($i = 0; $i < 4; $i++) {
		$a[$i] = (int)$number % 256;
		$number /= 256;
	}

	krsort($a);
	return implode('.', $a);
}

$number = 2130706433;
echo myLong2Ip($number);

/**
 * Календарь на текущий месяц в американском формате
 */
$dayOfMonth = date('t');
$dayCount = 1;
$num = 0;
$week = [];
for ($i = 0; $i < 7; $i++) {
	$dayOfWeek = date('w', mktime(0, 0, 0, (int)date('m'), $dayCount, (int)date('Y')));
	$dayOrWeek = $dayOfWeek - 1;

	if ($dayOfWeek == -1) {
		$dayOrWeek = 6;
	}

	if ($dayOfWeek == $i) {
		$week[$num][$i] = $dayCount;
		$dayCount++;
	} else {
		$week[$num][$i] = '';
	}
}

while (true) {
	$num++;
	for ($i = 0; $i < 7; $i++) {
		$week[$num][$i] = $dayCount;
		$dayCount++;

		if ($dayCount > $dayOfMonth) {
			break;
		}
	}

	if ($dayCount > $dayOfMonth) {
		break;
	}
}

$n = count($week);
$table = '<table border="1">';
for ($i = 0; $i < $n; $i++) {
	$table .= '<tr>';
	for ($j = 0; $j < 7; $j++) {
		if (!empty($week[$i][$j])) {
			if ($j == 5 || $j == 6) {
				$table .= "<td style=\"color:red;\">{$week[$i][$j]}</td>";
			} else {
				$table .= "<td>{$week[$i][$j]}</td>";
			}
		} else {
			$table .= "<td>&nbsp;</td>";
		}
	}
	$table .= "</tr>";
}
$table .= '<table>';
echo $table;

/**
 * Календарь на текущий месяц в российском формате
 */
$dayOfMonth = date('t');
$dayCount = 1;
$dayOfWeek = [];
$week = [];
$num = 0;
for ($i = 0; $i < 7; $i++) {
	$dayOfWeek = date('w', mktime(0, 0, 0, (int)date('m'), $dayCount, (int)date('Y')));
	$dayOfWeek -= 1;

	if ($dayOfWeek == -1) {
		$dayOfWeek = 6;
	}

	if ($dayOfWeek == $i) {
		$week[$num][$i] = $dayCount;
		$dayCount++;
	} else {
		$week[$num][$i] = '';
	}
}
while (true) {
	$num++;
	for ($i = 0; $i < 7; $i++) {
		$week[$num][$i] = $dayCount;
		$dayCount++;

		if ($dayCount > $dayOfMonth) {
			break;
		}
	}

	if ($dayCount > $dayOfMonth) {
		break;
	}
}
$n = count($week);
$table = '<table border="1">';
for ($i = 0; $i < 7; $i++) {
	$table .= '<tr>';
	for ($j = 0; $j < $n; $j++) {
		if (!empty($week[$j][$i])) {
			if ($i == 5 || $i == 6) {
				$table .= "<td style=\"color: red;\">{$week[$j][$i]}</td>";
			} else {
				$table .= "<td>{$week[$j][$i]}</td>";
			}
		} else {
			$table .= "<td>&nbsp;</td>";
		}
	}
	$table .= "</tr>";
}
echo $table;

/**
 * Замена символов bbCode,
 * использование функции str_replace()
 */
$text = 'Это [b]жирный[/b], жирный [b]текст';
$text = str_replace('[b]', '<b>', $text);
$text = str_replace('[/b]', '</b>', $text);
echo $text;

/**
 * Замена символов bbCode,
 * обработка только закрытых тегов
 */
$text = 'Это [b]жирный[/b], жирный [b]текст';
$result = '';
$lastocc = 0;
$sndooc = 1;
while ($sndooc) {
	$fstocc = strpos($text, '[b]', $lastocc);
	$sndocc = strpos($text, '[/b]', $fstocc);
	if (($fstocc > 0 && $sndocc > 0 && $lastocc > 0)
		|| ($fstocc >= 0 && $sndocc > 0 && $lastocc == 0)) {
		$result .= substr($text, $lastocc, $fstocc - $lastocc);
		$result .= '<b>' . substr($text, $fstocc + 3, $sndocc - $fstocc - 3) . '</b>';
		$lastocc = $sndocc + 4;
	} else {
		$result .= substr($text, $lastocc, strlen($text) - $lastocc);
		break;
	}
}
echo $result;

/**
 * Преобразование десятичного числа в двоичное
 */
$binary = '';
$dec = 137;
do {
	if (intval($dec) % 2) {
		$binary = '1'  . $binary;
	} else {
		$binary = '0' . $binary;
	}

	$dec = (int)$dec / 2;
} while ($dec);
echo $binary;//10001001
//альтернативное решение задачи
do {
	if (intval($dec) & 1) {
		$binary = '1' . $binary;
	} else {
		$binary = '0' . $binary;
	}

	$dec = $dec >> 1;
} while ($dec);
echo $binary;//10001001

/**
 * Преобразование двоичного числа в десятичное
 */
$dec = 0;
$multiplier = 1;
$bin = '101';
$n = strlen($bin);
for ($i = $n; $i; $i--, $multiplier *= 2) {
	if ($bin[$i - 1] == '1') {
		$dec += $multiplier;
	} elseif ($bin[$i - 1] != '0') {
		die ('Неверный формат');
	}
}
echo $dec;//5

/**
 * Возведение числа в степень
 */
$result = 1;
$number = 10;
$pow = 3;
for ($i = 0; $i < $pow; $i++) {
	$result *= $number;
}
echo $result . PHP_EOL;//125
//альтернативное решение задачи
echo $number ** $pow;//125

/**
 * Изменение регистра строки,
 * преобразование к верхнему регистру
 */
$result = '';
$string = 'hello';
$n = mb_strlen($string);
for ($i = 0; $i < $n; $i++) {
	$result .= chr(ord($string[$i]) & 223);
}
echo $result;

/**
 * Изменение регистра строки, преобразование к нижнему регистру
 */
$result = '';
$string = 'HELLO';
$n = strlen($string);
for ($i = 0; $i < $n; $i++) {
	$result .= chr(ord($string[$i]) | 32);
}
echo $result;

/**
 * Преобразование арабского числа в римское
 */
$number = 20;
if ($number > 2000 || $number < 1) {
	die ('Число должно быть от 1 до 2000');
}
$one = ['I', 'X', 'C', 'M'];
$five = ['V', 'L', 'D'];
$index = 0;
$result = '';
do {
	switch (intval($number % 10)) {
		case 1:
			$result = $one[$index] . $result;
			break;
		case 2:
			$result = $one[$index] . $result;
			$result = $one[$index] . $result;
			break;
		case 3:
			$result = $one[$index] . $result;
			$result = $one[$index] . $result;
			$result = $one[$index] . $result;
			break;
		case 4:
			$result = $five[$index] . $result;
			$result = $one[$index] . $result;
			break;
		case 5:
			$result = $five[$index] . $result;
			break;
		case 6:
			$result = $one[$index] . $result;
			$result = $five[$index] . $result;
			break;
		case 7:
			$result = $one[$index] . $result;
			$result = $one[$index] . $result;
			$result = $five[$index] . $result;
			break;
		case 8:
			$result = $one[$index] . $result;
			$result = $one[$index] . $result;
			$result = $one[$index] . $result;
			$result = $five[$index] . $result;
			break;
		case 9:
			$result = $one[$index + 1] . $result;
			$result = $one[$index] . $result;
			break;
	}
	$number = intval($number / 10);
	$index++;
} while ($number);
echo $result;//XX
