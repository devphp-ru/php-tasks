<?php

/**
 * Замена нескольких пробельных символов одним
 */
//вариант 1
$string = 'Замена    нескольких    пробельных   символов    одним';
echo $string . PHP_EOL;
$pattern = "#[\s]+#s";
$string = preg_replace($pattern, ' ', $string);
echo $string;
//вариант 2
$string = 'Замена    нескольких    пробельных   символов    одним';
echo $string . PHP_EOL;
$pattern = "#[ \f\t\v]+#s";
$string = preg_replace($pattern, ' ', $string);
echo $string;

/**
 * Необходимо извлечь названия HTML-страницы
 */
$html = <<<HTML
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
  </body>
</html>
HTML;
$pattern = "#<title>(.*)</title>#siU";
preg_match($pattern, $html, $matches);
echo $matches[0];
echo PHP_EOL;
$pattern = "#<h1>(.*)</h1>#siU";
preg_match($pattern, $html, $matches);
echo $matches[0];

/**
 * Необходимо преобразовать дату из формата YYYY-MM-DD в DD.MM.YYYY
 */
$date = '2022-05-28';
$pattern = "#([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})#";
preg_match($pattern, $date, $matches);
echo "{$matches[3]}.{$matches[2]}.{$matches[1]}";

/**
 * Необходимо проверить корректности ввода адреса электронной почты
 */
$email = 'user@mail.ru';
$pattern = "#^[-0-9a-z_]+@[-0-9a-z^\.]+\.[a-z]{2,6}$#i";
if (preg_match($pattern, $email, $matches)) {
    echo 'email is correct';
} else {
    echo 'email is incorrect';
}

/**
 * Преобразование массива $text в двумерный
 */
$content = file_get_contents(__DIR__ . '/file.php');
$content = preg_replace("#[\s]+#s", ' ', strip_tags($content));
$text = preg_split("#[\.!\?][\s]+#s", $content);
echo '<pre>';
print_r($text);
echo '</pre>';
