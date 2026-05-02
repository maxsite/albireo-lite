<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// Hover.css (http://ianlunn.github.io/Hover/)
// use.hover-css: +

if (checkStr(getPageData('use.hover-css', false)) === true)
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'hover-css/hover.css">';

# end of file
