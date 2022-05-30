<?php

/**
 * Выведите столбец чисел от 1 до 100
 */
foreach (range(1, 100) as $value) {
    echo $value . PHP_EOL;
}

/**
 * Выведите столбец четных чисел в промежутке от 0 до 100
 */
foreach (range(0, 100) as $value) {
    if (($value % 2) == 0) {
        echo $value . PHP_EOL;
    }
}

/**
 * Выведите столбец нечетных чисел в промежутке от 0 до 100
 */
foreach (range(0, 100) as $value) {
    if (($value % 2) !== 0) {
        echo $value . PHP_EOL;
    }
}

/**
 * Дан массив с элементами 1, 2, 3, 4, 5
 * С помощью цикла foreach найдите сумму квадратов элементов этого массива
 * Результат запишите переменную $result
 */
$result = 0;
$a = [1, 2, 3, 4, 5];
foreach ($a as $value) {
    $result += ($value * $value);
}
echo $result;
