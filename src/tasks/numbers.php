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
 * Дано трехзначное число 456.
 * Поменяйте среднюю цифру на ноль.
 */
$a = 456;
$a .= '';
$a[1] = 0;
echo $a;

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

/**
 * На одной строчке через пробел записаны два целых числа:
 * длина и ширина прямоугольника. Вычислите его площадь и периметр
 * (именно в таком порядке). Результат выведите на разных строках.
 * input 5 10
 * output 50 30
 */
echo 'Введите длину:';
$length = readline();
echo 'Введите ширину:';
$width = readline();
echo ($length * $width) . PHP_EOL;
echo (($length + $width) * 2) . PHP_EOL;

/**
 * В переменных a и b лежат положительные длины катетов прямоугольного треугольника.
 * Вычислить и вывести на экран площадь треугольника и его периметр.
 */
$a = 3;
$b = 4;
$c = sqrt($a * $a + $b * $b);
$s = ($a * $b) / 2;
$p = $c + $a + $b;
echo 'площадь: ' . $s . PHP_EOL;
echo 'периметр: ' . $p . PHP_EOL;

/**
 * Натуральное положительное число записано в переменную n.
 * Определить и вывести на экран, сколько цифр в числе n.
 */
$n = 414;
$a = ceil((log10($n) + 0.000000000000000000001));
echo $a;

/**
 * Создать программу, выводящую на экран случайно
 * сгенерированное трёхзначное натуральное
 * число и его наибольшую цифру.
 *
 * Примеры работы программы:
 * В числе 208 наибольшая цифра 8
 * В числе 774 наибольшая цифра 7
 * В числе 613 наибольшая цифра 6
 */
$n = mt_rand(111, 999);
$a = intval(($n / 100));
$b = intval(($n % 100) / 10);
$c = intval(($n % 10));
$d = max($a, $b, $c);
echo "В числе {$n} наибольшая цифра {$d}";

/**
 * Сформировать число, представляющее собой реверсную
 * (обратную в порядке следования разрядов)
 * запись заданного трехзначного числа.
 * Например, для числа 341 таким будет 143.
 */
$n = 341;
$n = (string)$n;
$n = $n[2] . $n[1] . $n[0];
echo $n;
echo PHP_EOL;
$n = 341;
$a = $n % 10;
$n = $n / 10;
$b = $n % 10;
$n = $n / 10;
$c = $n;
$n = intval(100 * $a + 10 * $b + $c);
echo $n;

/**
 * Дано четырехзначное число. Проверить, является ли оно палиндромом.
 * 1441, 5555, 7117
 */
$n = 1441;
$a = $n % 10;
$n = intval($n / 10);
$b = $n % 10;
$n = intval($n / 10);
$a = 10 * $a + $b;
var_dump($a === $n);

/**
 * Дано четырехзначное число 1322. Проверить, является ли оно «счастливым билетом».
 */
$n = 1322;
$right = $n % 10;
$n = intval($n / 10);
$right += $n % 10;
$n = intval($n / 10);
$left = $n % 10;
$n = intval($n / 10);
$left = $left + $n;
var_dump($left === $right);
