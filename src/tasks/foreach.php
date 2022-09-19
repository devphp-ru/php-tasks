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

/**
 * Дан массив с элементами 'html', 'css', 'php', 'js', 'jq'
 * С помощью цикла foreach выведите эти слова в столбик
 */
$list = ['html', 'css', 'php', 'js', 'jq'];
foreach ($list as $value) {
    echo $value . PHP_EOL;
}

/**
 * Дан массив $a 'blue' => 'Синий', 'green' => 'Зеленый', 'red' => 'Красный'
 * С помощью цикла foreach выведите на экран
 * столбец ключей и элементов в формате 'green => зеленый'
 */
$list = ['blue' => 'Синий', 'green' => 'Зеленый', 'red' => 'Красный'];
foreach ($list as $key => $value) {
    echo "{$key}=>{$value}" . PHP_EOL;
}

/**
 * Дан массив $users
 * с ключами 'Коля', 'Вася', 'Петя' и с элементами '200', '300', '400'
 * С помощью цикла foreach выведите на экран
 * столбец строк такого формата: 'Коля - зарплата 200 руб.'
 */
$users = ['Коля' => 200, 'Вася' => 300, 'Петя' => 400];
foreach ($users as $key => $value) {
    echo "{$key} - зарплата {$value} руб." . PHP_EOL;
}

/**
 * Дан массив с элементами 2, 5, 9, 15, 0, 4
 * С помощью цикла foreach и оператора if
 * выведите на экран столбец тех элементов массива,
 * которые больше 3-х, но меньше 10
 */
$a = [2, 5, 9, 15, 0, 4];
foreach ($a as $value) {
    if ($value > 3 && $value < 10) {
        echo $value . ' ';
    }
}

/**
 * Дан массив с числами 1, -1, 2, 3, -3, -4, 4, 5, -5
 * Числа могут быть положительными и отрицательными
 * Найдите сумму положительных элементов этого массива
 */
$numbers = [1, -1, 2, 3, -3, -4, 4, 5, -5];
$sum = 0;
foreach ($numbers as $value) {
    if ($value > 0) {
        $sum += $value;
    }
}
echo $sum;

/**
 * Дан массив с числами 1, -1, 2, 3, -3, -4, 4, 5, -5
 * Числа могут быть положительными и отрицательными
 * Найдите сумму отрицательных элементов этого массива
 */
$numbers = [1, -1, 2, 3, -3, -4, 4, 5, -5];
$sum = 0;
foreach ($numbers as $value) {
    if ($value < 0) {
        $sum += $value;
    }
}
echo $sum;

/**
 * Дан массив в числами, к примеру [1, 2, -1, -2, 3, -3]
 * Создайте из него новый массив так,
 * чтобы отрицательные числа стали положительными,
 * то есть у нас должен получиться такой массив: [1, 2, 1, 2, 3, 3]
 */
$numbers = [1, 2, -1, -2, 3, -3];
foreach ($numbers as $key => $value) {
    $numbers[$key] = abs($value);
}
print_r($numbers);

/**
 * Дан массив числами ['10', '20', '30', '50', '235', '3000']
 * Выведите на экран только те числа из массива,
 * которые начинаются на цифру 1, 2 или 5
 */
$numbers = ['10', '20', '30', '50', '235', '3000'];
foreach ($numbers as $value) {
    if ($value[0] == 1 || $value[0] == 2 || $value[0] == 5) {
        echo $value . ' ';
    }
}
echo  PHP_EOL;
foreach ($numbers as $value) {
    if (in_array($value[0], [1, 2, 5])) {
        echo $value . ' ';
    }
}

/**
 * Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9
 * С помощью цикла foreach создайте строку '-1-2-3-4-5-6-7-8-9-
 */
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$str = '-';
foreach ($numbers as $value) {
    $str .= $value . '-';
}
echo $str;

/**
 * Составьте массив дней недели.
 * С помощью цикла foreach выведите все дни недели,
 * а выходные дни выведите жирным
 */
$days = [
    'пн',
    'вт',
    'ср',
    'чт',
    'пт',
    'сб',
    'вс',
];
foreach ($days as $key => $value) {
    if ($key == 5 || $key == 6) {
        echo "<b>{$value}</b>" . PHP_EOL;
    } else {
        echo $value . PHP_EOL;
    }
}

/**
 * Вывести файлы и выровнять по правому краю
 */
$files = [
    'all.php', 'auth.php',
    'auth.txt', 'base.txt',
    'chat.html', 'config.php',
    'count.txt', 'count_new.txt',
    'counter.dat', 'counter.php',
    'create.php', 'dat.db'
];
$maxLength = 0;
foreach ($files as $value) {
    $length = strlen($value);
    if ($length > $maxLength) {
        $maxLength = $length;
    }
}
foreach ($files as $value) {
    printf("%{$maxLength}s" . PHP_EOL, $value);
}

/**
 * Даны два массива [1, 2, 3] и ['a', 'b', 'c'],
 * объедените их таким образом, чтобы на выходе был
 * одни массив в таком виде [1, 'a', 2, 'b', 3, 'c']
 */
$a = [1, 2, 3];
$b = ['a', 'b', 'c'];
$result = [];
foreach ($a as $k => $v) {
	$result[] = $a[$k];
	$result[] = $b[$k];
}
echo implode(', ', $result);
