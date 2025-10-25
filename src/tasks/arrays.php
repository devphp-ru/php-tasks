<?php

/**
 * Заполните массив $arr числами от 1 до 5. Не объявляйте массив,
 * а просто заполните его присваиванием $arr[] = новое значение.
 */
$arr[] = 1;
$arr[] = 2;
$arr[] = 3;
$arr[] = 4;
$arr[] = 5;
print_r($arr);

/**
 * Создайте двухмерный массив. Первые два ключа – это 'ru' и 'en'.
 * Пусть первый ключ содержит элемент, являющийся массивом
 * названий дней недели по-русски, а второй – по-английски.
 * Выведите с помощью этого массива понедельник по-русски
 * и среду по английски (пусть понедельник – это первый день).
 */
$days = [
	'ru' => [1 => 'пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'],
	'en' => [1 => 'mn', 'ts', 'wd', 'th', 'fr', 'st', 'sn'],
];
echo $days['ru'][1] . PHP_EOL;
echo $days['en'][3];

/**
 * Создайте массив ['a', 'b', 'c', 'd']
 * и с его помощью выведите на экран строку 'a+b, c+d'
 */
$a = ['a', 'b', 'c', 'd'];
echo $a[0] . '+' . $a[1] . ' ' . $a[2] . '+' . $a[3] . PHP_EOL;

/**
 * Создать массив и присвоить ему следующие значения
 * 'Apples', 'Bananas', 'Cantaloupes', 'Dates'
 * с указанием индексе и без
 */
$fruits[0] = 'Apples';
$fruits[1] = 'Bananas';
$fruits[2] = 'Cantaloupes';
$fruits[3] = 'Dates';
print_r($fruits);

$fruits[] = 'Apples';
$fruits[] = 'Bananas';
$fruits[] = 'Cantaloupes';
$fruits[] = 'Dates';
print_r($fruits);

/**
 * Создайте массив и присвойте значения
 * нескольких элементов массива в одной операции,
 * но при этом начальный индекс не должен быть равен 0.
 */
$cars = [
    1 => 'BMV',
    'Audi',
    'Acura',
    'LADA',
];
print_r($cars);

/**
 * Создайте и сохраните в массиве серию последовательных целых чисел.
 */
$numbers = range(1, 100);
print_r($numbers);

/**
 * Создайте и удалите из массива один или несколько элементов.
 */
$cars = [
    'Audi',
    'BMV',
    'Volvo',
    'Kia',
    'Ford',
];
unset($cars[1], $cars[3]);
print_r($cars);

/**
 * Создайте массив 'Audi', 'BMV', 'Volvo', 'Kia', 'Ford', 'Opel', 'Jeep',
 * и измените размер массива увеличте или уменьшите
 * его по сравннию с текущим размером.
 */
$cars = ['Audi', 'BMV', 'Volvo', 'Kia', 'Ford', 'Opel', 'Jeep'];
$cars[] = 'Fiat';
$cars[] = 'Bugatti';
print_r($cars);
$cars = array_slice($cars, 6);
print_r($cars);

/**
 * Вывести информацию о массиве в удобочитаемом виде
 */
$a = [
    'Andi',
    'Benny',
    'Cara',
    'Danny',
    'Emily',
];
print_r($a);

/**
 * Вывести информацию о массиве в удобочитаемом виде
 */
$a = [
    'Andi',
    'Benny',
    'Cara',
    'Danny',
    'Emily',
];
var_export($a);

/**
 * Вывести информацию о массиве в удобочитаемом виде, включая тип и значение
 */
$a = [
    'Andi',
    'Benny',
    'Cara',
    'Danny',
    'Emily',
];
var_dump($a);

/**
 * Получить из массива значения
 */
$a = [
    'car_1' => 'Andi',
    'car_2' => 'Benny',
    'car_3' => 'Cara',
    'car_4' => 'Danny',
    'car_5' => 'Emily',
];
$values = array_values($a);
print_r($values);

/**
 * Получить из массива ключи
 */
$a = [
    'car_1' => 'Andi',
    'car_2' => 'Benny',
    'car_3' => 'Cara',
    'car_4' => 'Danny',
    'car_5' => 'Emily',
];
$keys = array_keys($a);
print_r($keys);

/**
 * Дан массив $a 1, 2, 3, 4, 5
 * Подсчитайте количество элементов этого массива
 */
$a = [1, 2, 3, 4, 5];
$n = count($a);
echo $n;

/**
 * Дан массив $a 11, 22, 33, 44, 55.
 * С помощью функции count выведите последний элемент данного массива.
 */
$a = [11, 22, 33, 44, 55];
$last = $a[count($a) - 1];
echo $last;

/**
 * Дан массив вида [1, '' , 2, '' , '' , 3] – то есть в нем есть пустые строки.
 * Удалите все такие элементы из этого массива.
 */
$array = [1, '', 2, '', 3];
$array = array_filter($array);
var_dump($array);

/**
 * Создайте массив $a с элементами 2, 8, 5, 3.
 * Умножьте первый элемент массива на второй,
 * а третий элемент на четвертый.
 * Результаты сложите, присвойте переменной $b.
 * Выведите на экран значение этой переменной.
 */
$a = [2, 8, 5, 3];
$b = ($a[0] * $a[1]) + ($a[2] * $a[3]);
echo $b;

/**
 * Поменять местами наибольший и наименьший элементы массива.
 */
$a = [2, 5, 3, 1, 4];
$min = min($a);
$max = max($a);
$keyMin = array_search($min, $a);
$keyMax = array_search($max, $a);
$a[$keyMin] = $max;
$a[$keyMax] = $min;
print_r($a);

/**
 * Дан массив из 100 элементов.
 * Требуется вывести количество последовательных пар одинаковых элементов.
 *
 * Например: 1, 1, 2, 3, 4 -51, 12, 12, 12, -51
 * Ответ: 3
 */
$arr = [1, 1, 2, 3, 4 -51, 12, 12, 12, -51];
$result = 0;
foreach ($arr as $key => $value) {
    if (isset($arr[$key + 1]) && ($arr[$key + 1] === $value)) {
        $result++;
    }
}
echo $result;

$result = 0;
$n = count($arr) - 1;
for ($i = 0; $i < $n; $i++) {
    if ($arr[$i] === $arr[$i + 1]) {
        $result++;
    }
}
echo $result;

/**
 * Выделить уникальные записи (убрать дубли) в отдельный массив. в конечном массиве не должно быть элементов с одинаковым id.
 */
$arr = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "12.02.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "12.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "12.04.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "12.05.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "12.06.2020", 'name' => "test3"],
];
$uniques = [];
$result = array_filter($arr, function ($item) use (&$uniques): array {
    if (!in_array($item['id'], $uniques)) {
        $uniques[] = $item['id'];
        return $item;
    }
    return [];
});
print_r($result);

/**
 * Отсортировать многомерный массив по любому ключу
 */
$arr = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "12.02.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "12.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "12.04.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "12.05.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "12.06.2020", 'name' => "test3"],
];
$key = 'name';
uasort($arr, fn ($a, $b) => $a[$key] <=> $b[$key]);
print_r($arr);

/**
 * Вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)
 */
$arr = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "12.02.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "12.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "12.04.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "12.05.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "12.06.2020", 'name' => "test3"],
];
$id = 2;
$result = array_filter($arr, function ($item) use ($id) {
    return $item['id'] === $id;
});
print_r($result);

/**
 * Изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
 */
$arr = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "12.02.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "12.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "12.04.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "12.05.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "12.06.2020", 'name' => "test3"],
];
$key1 = 'name';
$key2 = 'id';
$result = array_combine(array_column($arr, $key1), array_column($arr, $key2));
print_r($result);

/**
 * Посчитать количество вхождений в массиве заданнго символа.
 * Массив ['пара', 'жара', 'нора']
 * Sample Input: а
 * Sample Output: 5
 */

$lists = ['пара', 'жара', 'нора'];
$letter = trim(fgets(STDIN));
$n = count($lists);
$counter = 0;

for ($i = 0; $i < $n; $i++) {
    $len = mb_strlen($lists[$i]);
    for ($j = 0; $j < $len; $j++) {
        $word = mb_str_split($lists[$i]);
        if ($letter === $word[$j]) {
            $counter++;
        }
    }
}

echo $counter;
