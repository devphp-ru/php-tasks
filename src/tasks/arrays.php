<?php

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
