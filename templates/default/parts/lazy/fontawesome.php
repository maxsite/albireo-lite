<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// Font Awesome Free: https://fontawesome.com
// use.fontawesome5: +
// use.fontawesome6: +

if (checkStr(getPageData('use.fontawesome5', false)) === true)
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'fontawesome/v5/fontawesome.css">';

if (checkStr(getPageData('use.fontawesome6', false)) === true)
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'fontawesome/v6/fontawesome.css">';

# end of file
