<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// https://icons.getbootstrap.com/
// use.bootstrap-icons: +

if (checkStr(getPageData('use.bootstrap-icons', false)) === true)
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'bootstrap-icons/bootstrap-icons.min.css">';

# end of file
