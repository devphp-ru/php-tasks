<?php

/**
 * Дана строка 'php'.
 * Сделайте из нее строку 'PHP'
 */
$string = 'php';
echo strtoupper($string);

/**
 * Дана строка 'PHP'.
 * Сделайте из нее строку 'php'
 */
$string = 'php';
echo strtolower($string);

/**
 * Дана строка 'london'.
 * Сделайте из нее строку 'London'
 */
$string = 'london';
echo ucfirst($string);

/**
 * Дана строка 'London'.
 * Сделайте из нее строку 'london'
 */
$string = 'london';
echo lcfirst($string);

/**
 * Дана строка 'london is the capital of great britain'.
 * Сделайте из нее строку 'London Is The Capital Of Great Britain'.
 */
$string = 'london is the capital of great britain';
echo ucwords($string);

/**
 * Разбить предложение на слова
 * 'PHP это распространённый язык программирования общего назначения с открытым исходным кодом'
 */
$string = 'PHP это распространённый язык программирования общего назначения с открытым исходным кодом';
$worlds = explode(' ', $string);
print_r($worlds);

/**
 * Вывод строки в обратном порядке
 * 'Hello world!'
 */
$string = 'Hello world!';
$string = strrev($string);
echo $string;

/**
 * Преобразовать первый символ строки
 * ('hello world!', 'привет мир!')
 * в верхний регистр
 */
$string = 'hello world!';
$string = ucfirst($string);
echo $string;
$string = 'привет мир!';
$string = ucfirst($string);
$ch = mb_strtoupper(mb_substr($string, 0, 1));
$string = $ch . mb_substr($string, 1);
echo $string;

/**
 * Замените в строке все вхождения 'word' на 'letter'.
 */
$string = 'Hello world, hello world, world hello';
$string = str_replace('world', 'letter', $string);
echo $string;

/**
 * Дана строка. Если ее длина больше 10,
 * то оставить в строке только первые 6 символов,
 * иначе дополнить строку символами 'o' до длины 12
 */
$string = 'Привет';
$string = trim($string);
$count = mb_strlen($string);
$limit = 10;
$number = 12;
$string = ($count > $limit)
    ? mb_substr($string, 0, 6)
    : $string .= str_repeat('o', ($number - $count));
echo $string;

/**
 * Дана строка.
 * Если она начинается на 'abc',
 * то заменить их на 'www',
 * иначе добавить в конец строки 'zzz'
 */
$string = 'abci';
$isString = (preg_match('#^abc#', $string) === 1);
$string = ($isString)
    ? str_replace(substr($string, 0, 3), 'www', $string)
    : $string . 'zzz';
echo $string;

/**
 * Дана строка string = a1b2c3d4i5fg67, найти количество цифр.
 */
$string = 'a1b2c3d4i5fg67';
$numbers = array_filter(mb_str_split($string), function ($v) {
    return is_numeric($v);
}, ARRAY_FILTER_USE_BOTH);
$count = count($numbers);
echo $count;

/**
 * Дана строка из 6-ти цифр (123231).
 * Проверьте, что сумма первых трех цифр
 * равняется сумме вторых трех цифр.
 * Если это так – выведите 'да',
 * в противном случае выведите 'нет'.
 */
$str = '123231';
$a = (int)($str[0] + $str[1] + $str[2]);
$b = (int)($str[3] + $str[4] + $str[5]);

echo ($a === $b) ? 'да' : 'нет';

/**
 * Сумма больших чисел
 * Дана строка, содержащая два положительных целых числа, разделённых пробелом. Числа могут быть большими и не умещаться в 64-битное целое. Нужно вывести сумму этих чисел.
 */
function sumStr(string $str): string
{
    [$s1, $s2] = explode(' ', $str);
    $l1 = strlen($s1);
    $l2 = strlen($s2);

    $result = '';
    $rest = 0;

    $max = max($l1, $l2) + 1;

    for ($i = 0; $i < $max; $i++) {
        $d1 = $s1[$l1 - $i] ?? 0;
        $d2 = $s2[$l2 - $i] ?? 0;

        $sum = $d1 + $d2 + $rest;
        $rest = intval($sum > 9);
        $result .= $sum % 10;
    }

    return strrev(rtrim($result, '0'));
}
$string = '2 6';
$result = sumStr($string);
echo $result;
