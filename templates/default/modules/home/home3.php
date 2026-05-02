<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// вариант на два разных вывода
// первая страница главной group-2.php, остальные one-column-3.php

$result = getPages(limit: getConfig('homeLimitPagination2', 10));
$files = $result['files'];

if (PAGINATION < 2) {
    // вывод для главной
    // делим эти 10 записей по 5 для вывода через group-2.php
    $arrayChunk = array_chunk($files, 5, true);

    foreach($arrayChunk as $a) {
        echo tpl(data: $a, tpl: TPL_DIR . 'group-2.php', add: ['before' => '<br>', 'header' => '', 'description' => '']) . '<br>';
    }
} else {
    // вывод для остальных пагинаций
    echo tpl(data: $files, tpl: TPL_DIR . 'one-column-3.php', add: ['columnClass' => 'w48', 'header' => '', 'description' => '']);
}

echo tpl(data: $result['pagination'], tpl: TPL_DIR . 'pagination1.php');

# end of file
