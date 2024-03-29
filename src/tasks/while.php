<?php

/**
 * Создайте переменную $a и присвойте ей ноль в качестве стартового значения
 * Выведите на экран при помощи цикла while цифры от 1 до 5,
 * использовав для этого операцию префиксного инкремента переменной $a
 */
$a = 0;
while ($a < 5) {
    echo ++$a . PHP_EOL;
}

/**
 * Создайте переменную $a и присвойте ей ноль в качестве стартового значения
 * Выведите на экран при помощи цикла do while цифры от 1 до 5,
 * использовав для этого операцию префиксного инкремента переменной $a
 */
$a = 0;
do {
    echo ++$a . PHP_EOL;
} while($a < 5);

/**
 * Создайте переменную $a и присвойте ей массив,
 * состоящий из пяти элементов
 * Выведите все элементы массива на экран
 */
$a = [1, 2, 3, 4, 5];
$n = count($a);
$i = 0;
while ($i < $n) {
    echo $a[$i++] . PHP_EOL;
}

/**
 * Создайте переменную $a и присвойте ей массив,
 * состоящий из пяти элементов.
 * Выведите все элементы массива на экран циклом  do while
 */
$a = [1, 2, 3, 4, 5];
$n = count($a);
$i = 0;
do {
    echo $a[$i++] . PHP_EOL;
} while ($i < $n);

/**
 * Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8
 * С помощью цикла и функций array_shift и array_pop выведите
 * на экран его элементы в следующем порядке: 18273645
 */
$a = [1, 2, 3, 4, 5, 6, 7, 8];
$n = count($a);
while ($n != 0) {
    $first = array_shift($a);
    $end = array_pop($a);
    echo $first . $end;
}

/**
 * Дан массив с элементами
 * 5, 5, 3, 5, 3, 5, 1, 10, 8, 5, 2, 0, 6, 5
 * Найти указанное значение 5 и записать их в массив
 */
$a = [5, 5, 3, 5, 3, 5, 1, 10, 8, 5, 2, 0, 6, 5];
$x = 5;
$b = [];
$n = count($a);
$i = 0;
while ($i < $n) {
    if ($x === $a[$i]) {
        $b[] = $a[$i];
    }
    $i++;
}
print_r($b);

/**
 * Вывести 3 случайных числа от 0 до 100 без повторений.
 */
do {
    $a = mt_rand(1, 100);
    $b = mt_rand(1, 100);
    $c = mt_rand(1, 100);
    if (($a != $b && $a != $c) && ($b != $c)) {
        echo $a . ' ' . $b . ' ' . $c;
        break;
    }

} while (true);
