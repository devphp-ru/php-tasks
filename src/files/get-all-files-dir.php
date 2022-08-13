<?php

/**
 * Получить список файлов директории в виде массива
 */
function listFiles(string $path): array
{
    if ($path[mb_strlen($path) - 1] != '/') {
        $path .= '/';
    }

    $files = [];
    $currentDir = opendir($path);
    while (false !== ($file = readdir($currentDir))) {
        if (!in_array($file, ['.', '..']) && !is_dir($file) && $file[0] != '.') {
            $files[] = $file;
        }
    }

    closedir($currentDir);

    return $files;
}

print_r(listFiles(__DIR__));
