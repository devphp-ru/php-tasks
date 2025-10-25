<?php

/**
 * Сортировка пузырьком (Bubble Sort) — простой алгоритм сортировки, основанный на многократном проходе по сортируемому массиву.
 * Классическая формулировка: дан массив из n элементов, требуется упорядочить его по возрастанию (или убыванию) значений элементов.
 * Временная сложность алгоритма — O(n²) в худшем и среднем случаях, где n — количество элементов.
 */
function bubbleSort(array $arr): array
{
    $n = count($arr);

    if ($n <= 1) {
        return $arr;
    }

    for ($i = 0; $i < $n; $i++) {
        for ($j = ($n - 1); $j > $i; $j--) {
            if ($arr[$j] < $arr[$j - 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $tmp;
            }
        }
    }

    return $arr;
}
$arr = [5, 2, 1, 3, 4];
$result = bubbleSort($arr);
print_r($result);

/**
 * Сортировка вставками (Insertion sort) — алгоритм сортировки, в котором элементы входной
 * последовательности просматриваются по одному, и каждый новый поступивший элемент размещается
 * в подходящее место среди ранее упорядоченных элементов.
 * Временная сложность алгоритма — O(n²) в среднем и в худшем случаях. В лучшем случае (когда массив уже отсортирован) сложность — O(n).
 */
function insertSort(array $arr): array
{
    $n = count($arr);

    if ($n <= 1) {
        return $arr;
    }

    for ($i = 1; $i < $n; $i++) {
        $value = $arr[$i];
        $j = ($i - 1);

        while (isset($arr[$j]) && ($arr[$j] > $value)) {
            $arr[$j + 1] = $arr[$j];
            $arr[$j] = $value;
            $j--;
        }
    }

    return $arr;
}
$arr = [5, 2, 1, 3, 4];
$result = insertSort($arr);
print_r($result);

/**
 * Сортировка выбором (Selection Sort) — алгоритм сортировки, который находит наименьший
 * (или наибольший) элемент в массиве и перемещает его в начало (или конец).
 * Временная сложность алгоритма — в худшем случае O(n²), где n — количество элементов в массиве.
 */
function selectSort(array $arr): array
{
    $n = count($arr);

    if ($n <= 1) {
        return $arr;
    }

    for ($i = 0; $i < $n; $i++) {
        $k = $i;
        for ($j = ($i + 1); $j < $n; $j++) {
            if ($arr[$k] > $arr[$j]) {
                $k = $j;
            }
        }

        if ($k != $i) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$k];
            $arr[$k] = $tmp;
        }
    }

    return $arr;
}
$arr = [5, 2, 1, 3, 4];
$result = selectSort($arr);
print_r($result);

/**
 * Сортировка слиянием (англ. Merge sort) — алгоритм сортировки, основанный на принципе «разделяй и властвуй».
 * Временная сложность алгоритма — O(n log n), где n — количество элементов в массиве.
 * Это связано с тем, что массив делится на две части логарифмическое количество раз (log n),
 * и каждая операция слияния требует линейного времени (O(n)).
 */
function mergeSort(array $arr): array
{
    $n = count($arr);

    if ($n <= 1) {
        return $arr;
    }

    $left = array_slice($arr, 0, (int)($n / 2));
    $right = array_slice($arr, (int)($n / 2));

    $left = mergeSort($left);
    $right = mergeSort($right);

    return merge($left, $right);
}
function merge(array $left, array $right): array
{
    $result = [];

    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] < $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }

    array_splice($result, count($result), 0, $left);
    array_splice($result, count($result), 0, $right);

    return $result;
}
$arr = [5, 2, 1, 3, 4];
$result = mergeSort($arr);
print_r($result);

/**
 * Быстрая сортировка (Quick Sort) — алгоритм сортировки, основанный на принципе «разделяй и властвуй».
 * Разработан в 1960 году Чарльзом Энтони Ричардом Хоаром .
 * Временная сложность алгоритма:
 * В среднем случае — O(n log n).
 * В худшем случае — O(n²).
 */
function quickSort(array $arr): array
{
    $n = count($arr);

    if ($n <= 1) {
        return $arr;
    }

    $firstValue = $arr[0];
    $left = [];
    $right = [];

    for ($i = 1; $i < $n; $i++) {
        if ($arr[$i] <= $firstValue) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    $left = quickSort($left);
    $right = quickSort($right);

    return array_merge($left, [$firstValue], $right);
}
$arr = [5, 2, 1, 3, 4];
$result = quickSort($arr);
print_r($result);

/**
 * Бинарный поиск (также известен как двоичный поиск, метод деления пополам или дихотомия)
 * алгоритм поиска элемента в отсортированном массиве данных.
 * Бинарный поиск гораздо более эффективный в сравнении с линейным поиском.
 * Временная сложность алгоритма:
 * В среднем случае — O(n log n).
 * В худшем случае — O(n²).
 */
function binarySearch(array $array, int $x): int
{
    $i = 0;
    $n = count($array);

    while ($i !== $n) {
        $m = (int)(($i + $n) / 2);
        if ($x === $array[$m]) {
            return $m;
        }

        if ($x < $array[$m]) {
            $n = $m;
        } else {
            $i = ($m + 1);
        }
    }

    return 0;
}
$x = 8;
$a = [3, 5, 6, 8, 12, 15, 17, 18, 20, 25];
$result = binarySearch($a, $x);
echo $result;

/**
 * Напишите функцию, которая принимает массив с разными числами, а возвращает наиболее встрещающееся число из этого массива.
 * Sample Input: [1, 3, 2, 2, 2, 3, 0]
 * Sample Output: 2
 */
function search(array $a): int
{
    $n = count($a);
    $result = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = ($i + 1); $j < $n; $j++) {
            if ($a[$i] === $a[$j]) {
                $result = (int)$a[$j];
            }
        }
    }

    return $result;
}

$a = [1, 3, 2, 2, 2, 3, 0];
$result = search($a);
echo $result;
