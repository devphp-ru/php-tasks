<?php

/**
 * С помощью цикла for заполните массив числами от 1 до 100
 * То есть у вас должен получится массив [1, 2, 3... 100]
 */
$a = [];
$n = 100;
for ($i = 1; $i <= $n; ++$i) {
    $a[] = $i;
}
print_r($a);

/**
 * Заполните массив числами от 1 до 10 с помощью цикла
 */
$a = [];
$n = 10;
for ($i = 1; $i <= $n; ++$i) {
    $a[] = $i;
}
print_r($a);

/**
 * Заполните массив числами от 10 до 1 с помощью цикла
 */
$a = [];
$n = 10;
for ($i = $n; $i > 0; --$i) {
    $a[] = $i;
}
print_r($a);

/**
 * Выведите с помощью цикла столбец четных чисел от 1 до 100
 */
$n = 100;
for ($i = 1; $i <= 100; ++$i) {
    if (($i % 2) == 0) {
        echo $i . PHP_EOL;
    }
}

/**
 * Выведите с помощью цикла столбец нечетных чисел от 1 до 100
 */
$n = 100;
for ($i = 1; $i <= $n; ++$i) {
    if (($i % 2) !== 0) {
        echo $i . PHP_EOL;
    }
}

/**
 * Найдите с помощью цикла сумму чисел от 1 до 100
 */
$n = 100;
$sum = 0;
for ($i = 1; $i <= $n; ++$i) {
    $sum += $i;
}
echo $sum;

/**
 * Найдите с помощью цикла сумму квадратов чисел от 1 до 15
 */
$n = 15;
$sum = 0;
for ($i = 1; $i <= $n; ++$i) {
    $sum += $i * $i;
}
echo $sum;

/**
 * Заполните массив 10-ю иксами с помощью цикла
 */
$n = 10;
$a = [];
for ($i = 1; $i <= $n; ++$i) {
    $a[] = 'x';
}
print_r($a);

/**
 * Заполните массив 10-ю случайными числами от 1 до 10 с помощью цикла
 */
$n = 10;
$a = [];
for ($i = 1; $i <= $n; ++$i) {
    $a[] = mt_rand(1, 10);
}
print_r($a);

/**
 * С помощью цикла создайте строку из 6-ти символов,
 * состоящую из случайных чисел от 1 до 9
 */
$n = 6;
$string = '';
for ($i = 1; $i <= $n; ++$i) {
    $string .= mt_rand(1, 9);
}
echo $string;

/**
 * Дан массив с числами $a 1, 2, 3, 4, 6, 9, 11
 * С помощью цикла найдите сумму элементов этого массива
 */
$a = [1, 2, 3, 4, 6, 9, 11];
$sum = 0;
$n = count($a);
for ($i = 0; $i < $n; ++$i) {
    $sum += $a[$i];
}
echo $sum;

/**
 * Дан массив с числами $a 1, 2, 3, 4, 6, 9, 11
 * С помощью цикла найдите сумму квадратов элементов этого массива
 */
$a = [1, 2, 3, 4, 6, 9, 11];
$sum = 0;
$n = count($a);
for ($i = 0; $i < $n; ++$i) {
    $sum += $a[$i] * $a[$i];
}
echo $sum;

/**
 * Дан массив с числами $a 1, 2, 3, 4, 6, 9, 11
 * С помощью цикла найдите корень из суммы квадратов элементов этого массива
 * Результат округлите в меньшую сторону до целых
 */
$a = [1, 2, 3, 4, 6, 9, 11];
$sum = 0;
$n = count($a);
for ($i = 0; $i < $n; ++$i) {
    $sum += $a[$i] * $a[$i];
}
echo floor(sqrt($sum));

/**
 * Дан массив с числами -1, 1, 2, 12, 3, -2, 4, 0, 6, 9, 11
 * Найдите сумму тех элементов массива, которые больше 0 и меньше 10
 */
$a = [-1, 1, 2, 12, 3, -2, 4, 0, 6, 9, 11];
$sum = 0;
$n = count($a);
for ($i = 0; $i < $n; ++$i) {
    if ($a[$i] > 0 && $a[$i] < 10) {
        $sum += $a[$i];
    }
}
echo $sum;

/**
 * С помощью цикла сформируйте строку '1223334444...'
 * и так далее до заданного числа
 */
$string = '';
$n = 10;
for ($i = 1; $i <= $n; $i++) {
    for ($j = $i; $j > 0; --$j) {
        $string .= $i;
    }
}
echo $string;
echo PHP_EOL;
$string = '';
$n = 10;
for ($i = 1; $i <= $n; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        $string .= $i;
    }
}
echo $string;

/**
 * Дан многомерный массив (см. его под задачей)
 * С помощью цикла выведите строки в формате 'имя, зарплата'
 */
$a = [
    0 => ['name' => 'Коля', 'salary' => 300],
    1 => ['name' => 'Вася', 'salary' => 400],
    2 => ['name' => 'Петя', 'salary' => 500],
];
$n = count($a);
for ($i = 0; $i < $n; $i++) {
    echo "Имя: {$a[$i]['name']}, зарплата: {$a[$i]['salary']}" . PHP_EOL;
}

/**
 * Заполните двумерный массив случайными числами от 1 до 10
 * В каждом подмассиве должно быть по 10 элементов
 * Должно быть 10 подмассивов
 */
$a = [];
$n = 10;
for ($i = 1; $i <= $n; $i++) {
    for ($j = 1; $j <= $n; $j++) {
        $a[$i][$j] = mt_rand(1, 10);
    }
}
print_r($a);
