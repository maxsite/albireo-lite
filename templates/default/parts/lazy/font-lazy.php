<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

/*
Подключение шрифтов из _resources/fonts/

use.font[gabriela]: +
use.font.lazy[gabriela]: +

Где «alegreya» это _resources/fonts/gabriela/gabriela.css

*/

if ($fonts = getKeysPageData('use.font.lazy', '')) {
    
    foreach ($fonts as $font => $on) {
        if (checkStr($on) === true) {
            $fn = RESOURCES_DIR . 'fonts' . DIRECTORY_SEPARATOR . $font . DIRECTORY_SEPARATOR . $font . '.css';
            if (file_exists($fn))
               echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'fonts/' . $font . '/' . $font . '.css">';
        }
    }
}

# end of file
