<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

/*
Вывод extras-файла
extras.end[file1.php]: +
extras.end[file2.php]: -

*/

if ($extras = getKeysPageData('extras.end', '')) {
    foreach ($extras as $file => $on) {
        if (checkStr($on) === true) {
            echo extras($file);
        }
    }
}

# end of file
