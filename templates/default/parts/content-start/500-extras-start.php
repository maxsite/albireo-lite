<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

/*
Вывод extras-файла
extras.start[file1.php]: +
extras.start[file2.php]: -

Отличается от 10-extras-start.php тем, что выводится после файлов навигации

*/

if ($extras = getKeysPageData('extras.start', '')) {
    foreach ($extras as $file => $on) {
        if (checkStr($on) === true) {
            echo extras($file);
        }
    }
}


# end of file
