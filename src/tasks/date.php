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

/**
 * Формирование массива, содержащий все дни из интервала на основе strtotime
 */
function getDates(string $start, string $end, $format = 'd.m.Y'): array
{
    $day = 86400;
    $start = strtotime($start . '-1 days');
    $end = strtotime($end . '+1 days');
    $n = round(($end - $start) / $day);

    $dates = [];
    for ($i = 1; $i < $n; $i++) {
        $dates[] = date($format, ($start + ($i * $day)));
    }

    return $dates;
}

print_r(getDates('01.08.2022', '13.08.2022'));
