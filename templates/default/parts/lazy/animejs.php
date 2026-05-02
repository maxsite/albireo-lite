<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// Анимация JS: https://animejs.com/
// use.animejs: +

if (checkStr(getPageData('use.animejs', false)) === true) {
    echo '<script src="' . RESOURCES_URL . 'animejs/anime.min.js"></script>';
}

# end of file
