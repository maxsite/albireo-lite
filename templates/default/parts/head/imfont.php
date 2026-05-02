<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// https://maxsite.org/mf/icons-im
// use.imfont: +

if (checkStr(getPageData('use.imfont', false)) === true) 
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'imfont/imfont.css">';

# end of file
