<?php

/**
 * Регулярные выражения
 */

/**
 * Удаление изображений из HTML-страницы
 */
$content = file_get_contents(__DIR__ . '/file.php');
$pattern = '#<img[^>]+>#si';
$replace = '';
$content = preg_replace($pattern, $replace, $content);
echo $content;

/**
 * Преобразование нескольких пробельных символов в один
 */
//html документ
$content = file_get_contents(__DIR__ . '/file.php');
$content = strip_tags($content);
$pattern = '#[\s]+#s';
$replace = ' ';
$content = preg_replace($pattern, $replace, $content);
echo $content . PHP_EOL;
//текст
$text = 'Преобразование        нескольких      пробельных    символов    в один  ';
$text = preg_replace($pattern, $replace, $text);
echo $text . PHP_EOL;//Преобразование нескольких пробельных символов в один
//Альтернативное решение задачи
$text = 'Преобразование        нескольких      пробельных    символов    в один  ';
$pattern = "#[ \f\t\v]+#s";
$replace = ' ';
$text = preg_replace($pattern, $replace, $text);
echo $text;

/**
 * Извлечение названия HTML-страницы
 */
$content = file_get_contents(__DIR__ . '/file.php');
$pattern = '#<title>(.*)</title>#siU';
if (preg_match($pattern, $content, $matches)) {
	echo $matches[1];
}

/**
 * Преобразование даты из формата YYYY-MM-DD в DD.MM.YYYY
 */
$date = '2023-02-25';
$pattern = '#([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})#';
preg_match($pattern, $date, $matches);
echo "{$matches[3]}.{$matches[2]}.{$matches[1]}";//25.02.2023

/**
 * Проверка корректности адреса электронной почты
 */
$email = 'support@example.com';
$pattern = '#^[-0-9a-z_]+@[-0-9a-z^\.]+\.[a-z]{2,6}$#i';
if (!preg_match($pattern, $email)) {
	echo 'Вы ввели некорректный адрес электронной почты.';
} else {
	echo $email;
}

/**
 *  Проверка корректности ввода URL
 */
$url = 'https://domain.ru';
$pattern = '/^(http|https):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(?::\d{1,5})?(?:$|[?\/#])/i';
echo preg_match($pattern, $url) ? 'url верен' : 'url неверен';

$number = '3';
$price = '100';
if (!preg_match("#^[\d]*$#", $number)) {
	die ('Неверный формат числа.');
}
if (!preg_match("#^[\d]*[\.,]?[\d]*$#", $price)) {
	die ('Неверный формат цены.');
}
//300.00
echo number_format(((int)$number * (int)$price), 2, '.', ' ');

/**
 * Замена текста
 */
function replaceText(array $matches): string
{
	return mb_substr($matches[0], 0, 1) . mb_strtolower(mb_substr($matches[0], 1));
}
$text = 'ПРОГРАММИРОВАНИЕ - это ИСКУССТВО. Ему и ЖИЗНЬ посвятить не жалко.';
$pattern = '#[А-ЯЁ]{2,}#';
$result = preg_replace_callback($pattern, 'replaceText', $text);
//Программирование - это Искусство. Ему и Жизнь посвятить не жалко.
echo $result;

/**
 * Разбивка длинной строки
 */
function splitText(array $matches): string
{
	return wordwrap($matches[0], 25, '<br>', true);
}
$content = 'AAAAAAAAAAaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAAAAAAAAAAaaaaaaaaa';
$pattern = '#(\w{25,})#';
$result = preg_replace_callback($pattern, 'splitText', $content);
//AAAAAAAAAAaaaaaaaaaaaaaaa<br>aaaaaaaaaaaaaAAAAAAAAAAAA<br>Aaaaaaaaaa
echo $result;

/**
 * Разбивка текста на предложения
 */
$content = file_get_contents(__DIR__ . '/file.php');
$pattern = '#[\s]+#s';
$content = preg_replace($pattern, ' ', trim(strip_tags($content)));
$pattern = '#[\.!\?][\s]+#';
$result = preg_split($pattern, $content);
print_r($result);
/**
 * Преобразование массива $text в двумерный
 */
$text = [
	'Для решения этой задачи понадобится функция preg_match_all(), которая, в отличие от preg_match(), находит все соответствия регулярному выражению',
	'Синтаксис функции подробно обсуждается в разделе П1.2.3',
	'Для решения исходной задачи так же, как и в предыдущем разделе, уничтожим все лишние HTML-теги',
	'Для поиска всех односимвольных слов потребуется регулярное выражение "|\b[\w]{1}\b|s"',
	'Последовательность \b является так называемой границей слова — без указания границ слова, регулярное выражение [\w]{1} будет соответствовать каждой букве любого слова',
	'Окончательно подсчет односимвольных слов может выглядеть так, как это представлено в листинге II.2.16.',
];
$n = count($text);
for ($i = 0; $i < $n; $i++) {
	$text[$i] = preg_split('#[-\s,]+#s', $text[$i]);
}
print_r($text);

