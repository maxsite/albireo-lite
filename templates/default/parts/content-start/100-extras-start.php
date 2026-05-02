<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

/*
Вывод extras-файла
extras.start0[file1.php]: +
extras.start0[file2.php]: -

*/

if ($extras = getKeysPageData('extras.start0', '')) {
    foreach ($extras as $file => $on) {
        if (checkStr($on) === true) {
            echo extras($file);
        }
    }
}


# end of file
