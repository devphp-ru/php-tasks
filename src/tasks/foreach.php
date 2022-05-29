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

