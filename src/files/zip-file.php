<?php

/**
 * Создать 100 файлов .txt с произвольным содержимым
 * и поместить их в zip архив, к каждому файлу прибавить уникальный индекс
 */
$zip = new ZipArchive();
$path = __DIR__ . '/files';
for ($i = 1; $i <= 100; $i++) {
    $fileZip = $path . "/zip_{$i}.zip";
    $result = $zip->open($fileZip, ZipArchive::CREATE);
    if ($result === true) {
        $title = 'title-'. $i;
        $content = 'content-' . $i;
        $string = "{$i}:{$title}:{$content}";
        $filename = "file_{$i}.txt";
        $zip->addFromString($filename, $string);
        $zip->close();
    }
}

