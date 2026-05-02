<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// Анимация CSS: https://una.github.io/CSSgram/
// use.cssgram: +

if (checkStr(getPageData('use.cssgram', false)) === true)
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'cssgram/cssgram.min.css">';

# end of file
