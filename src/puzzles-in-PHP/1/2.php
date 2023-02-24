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
