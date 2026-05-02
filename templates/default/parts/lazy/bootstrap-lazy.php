<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// https://getbootstrap.com/
// use.bootstrap5: +
// use.bootstrap4: +

// в HEAD bootstrap5.min.css
// в BODY bootstrap5.min.js

if (checkStr(getPageData('use.bootstrap5', false)) === true)
    echo '<script src="' . RESOURCES_URL . 'bootstrap/bootstrap5.min.js"></script>';

if (checkStr(getPageData('use.bootstrap4', false)) === true)
    echo '<script src="' . RESOURCES_URL . 'bootstrap/bootstrap4.min.js"></script>';

# end of file
