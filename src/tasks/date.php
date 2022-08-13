<?php

/**
 * Формирование массива, содержащий все дни из интервала
 */
$period = new DatePeriod(
    new DateTime('01.08.2022'),
    new DateInterval('P1D'),
    new Datetime('13.08.2022 23:59')
);
$dates =[];
foreach ($period as $value) {
    $dates[] = $value->format('d.m.Y');
}
print_r($dates);
