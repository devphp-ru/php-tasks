<?php

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
