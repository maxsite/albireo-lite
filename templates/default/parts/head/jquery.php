<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// https://jquery.com/
// use.jquery2: +   jQuery v2.x.x
// use.jquery3: +   jQuery v3.x.x

if (checkStr(getPageData('use.jquery2', false)) === true)
    echo '<script src="' . RESOURCES_URL . 'jquery/jquery-2.min.js"></script>';

if (checkStr(getPageData('use.jquery3', false)) === true)
    echo '<script src="' . RESOURCES_URL . 'jquery/jquery-3.min.js"></script>';


# end of file
