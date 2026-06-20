<?php

/**
 * (c) Albireo CMS, https://maxsite.org/albireo, 2020-2026
 *
 * Скрипт создаёт zip-архив указанных каталогов сервера
 * После скачивания zip-файла удалите его с сервера в целях безопасности.
 *
 * https://site.com/zip.php?секретный_ключ
 */

// Секретный ключ обязателен, например secret
$secretKey = '';

// Папки для архивации
$directoriesToAdd = ['website', 'system', 'templates'];

// Файлы для добавления
$filesToAdd = ['index.php', 'zip.php', '.htaccess', 'robots.txt'];

// Исключаемые папки
$excludeDirs = ['website/pages/landings', 'website/pages/demo'];

// Исключаемые файлы
$excludeFiles = [];

///////////////////////////////////////////////////////////////////////////////

if (!$secretKey) exit('Secret Key not Found...');
if (!isset($_GET[$secretKey])) exit('Access denied!');

// имя файла содержит метку времени и случайный набор символов
$archiveName = 'site-' . date('Y-m-d-H-i-s_') . substr(md5(random_bytes(8)), 0, 8) . '.zip';

$zip = new ZipArchive();

if ($zip->open($archiveName, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
    exit('Error: Failed to create archive!');
}

// Добавляем выбранные папки
foreach ($directoriesToAdd as $dir) {
    $fullPath = __DIR__ . '/' . $dir;
    if (file_exists($fullPath)) {
        addToZip($fullPath, __DIR__, $zip, $excludeDirs, $excludeFiles);
    }
}

// Добавляем в архив указанные файлы из корня
foreach ($filesToAdd as $file) {
    $fullPath = __DIR__ . '/' . $file;
    
    if (file_exists($fullPath) && is_file($fullPath)) {
        if (!in_array($file, $excludeFiles)) {
            $zip->addFile($fullPath, $file);
        }
    }
}

$zip->close();

echo "<p>Archive created: <a href='$archiveName'>$archiveName</a></p><p>Storing the zip file on the server is not secure. Delete it after downloading.</p>";

// Функция добавления файлов и папок
function addToZip($path, $basePath, &$zip, $excludeDirs, $excludeFiles) {
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $file) {
        if ($file->isDir()) continue;

        $filePath = $file->getRealPath();
        $relativePath = ltrim(str_replace($basePath, '', $filePath), DIRECTORY_SEPARATOR);

        $excluded = false;

        foreach ($excludeDirs as $dir) {
            $dir = str_replace('/', DIRECTORY_SEPARATOR, $dir);

            if (strpos($relativePath, $dir . DIRECTORY_SEPARATOR) === 0) {
                $excluded = true;
                break;
            }
        }

        if (in_array($relativePath, $excludeFiles)) $excluded = true;

        if (!$excluded) {
            $zip->addFile($filePath, $relativePath);
        }
    }
}

# end of file