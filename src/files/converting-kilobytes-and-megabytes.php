<?php

/**
 * Конвертация результата в килобайты и мегабайты
 *
 * @param int $size
 * @return string|null
 */
function convertBytes(int $size): ?string
{
	$i = 0;
	while (floor($size / 1024) > 0) {
		++$i;
		$size /= 1024;
	}

	$size = str_replace('.', ',', round($size, 1));

	switch ($i) {
		case 0:
			return $size . ' байт';
		case 1:
			return $size . ' КБ';
		case 3:
			return $size . ' МБ';
	}

	return null;
}
echo convertBytes(1340);

