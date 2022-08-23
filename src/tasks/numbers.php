<?php

/**
 * Даны два числа 4 и 6. Найдите сумму их квадратов
 */
$a = 4;
$b = 6;
$c = ($a * $a) + ($b * $b);
echo $c;

/**
 * Даны два числа 5 и 7. Найти их сумму и произведение
 */
$a = 5;
$b = 7;
$c = $a + $b;
$d = $a * $b;
echo $c . ' ' . $d;

/**
 * Даны три числа 3, 5, 8. Найдите их среднее арифметическое
 */
$a = 3;
$b = 5;
$c = 8;
$d = ($a + $b + $c) / 3;
echo $d;

/**
 * Даны три ненулевых числа a = 4, b = 8, c = 3
 * Найдите всевозможные результаты деления суммы двух
 * из них на оставшееся третье число.
 */
$a = 4;
$b = 8;
$c = 3;

$d = ($a + $b) / $c;
echo $d . PHP_EOL;
$e = ($b + $c) / $a;
echo $e . PHP_EOL;
$f = ($a + $c) / $b;
echo $f . PHP_EOL;

/**
 * Дано два числа 17 и 54.
 * Найдите сумму 40% от первого числа
 * и 84% от второго числа.
 */
$a = 17;
$b = 54;
$sum1 = ($a * .40);
echo $sum1 . PHP_EOL;
$sum2 = ($b * .84);
echo $sum2 . PHP_EOL;
echo $sum1 + $sum2 . PHP_EOL;

/**
 * Дано трехзначное число 123.
 * Найдите сумму его цифр.
 */
$number = 123;
$strNumber = (string)$number;
echo ($strNumber[0] + $strNumber[1] + $strNumber[2]) . PHP_EOL;

$number .= '';
echo ($strNumber[0] + $strNumber[1] + $strNumber[2]) . PHP_EOL;

/**
 * Требуется проверить, содержит ли переменная числовое значение,
 * даже если она имеет строковый тип.
 */
$a = [5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200'];
foreach ($a as $value) {
    $actualType = gettype($value);
    echo "Тип: {$actualType}, значение: {$value} это число? ";
    if (is_numeric($value)) {
        echo 'да';
    } else {
        echo 'нет';
    }
    echo PHP_EOL;
}


