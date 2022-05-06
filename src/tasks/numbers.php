<?php

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


