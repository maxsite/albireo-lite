<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// это подключение разных css-файлов в конце BODY
// см. parts/head/css.php

// css.fonts.lazy: fontawesome5.css, lora.css
if ($files = getPageData('css.fonts.lazy')) {
    foreach (strExplode($files) as $file) {
        if ($fn = findFile($file, 
            [SERVICE_MY_DIR . 'assets/css/fonts', ASSETS_DIR . 'css/fonts'], 
            [SERVICE_MY_URL . 'assets/css/fonts', ASSETS_URL . 'css/fonts'])) {
                
            echo '<link rel="stylesheet" href="' . $fn . '?' . ALBIREO_VERSION . '">';
        }
    }
}

// для удобства в виде [], чтобы не перебивать css.fonts.lazy
// css.fonts.lazy[]: fontawesome5.css
// css.fonts.lazy[]: lora.css
if ($files = getKeysPageData('css.fonts.lazy', '[val]')) {
    foreach ($files as $file) {
        if ($fn = findFile($file, 
            [SERVICE_MY_DIR . 'assets/css/fonts', ASSETS_DIR . 'css/fonts'], 
            [SERVICE_MY_URL . 'assets/css/fonts', ASSETS_URL . 'css/fonts'])) {
                
            echo '<link rel="stylesheet" href="' . $fn . '?' . ALBIREO_VERSION . '">';
        }     
    }
}

// css.lazy[]: my.css
if ($files = getKeysPageData('css.lazy', '[val]')) {
    foreach ($files as $file) {
        if ($fn = findFile($file, 
            [SERVICE_MY_DIR . 'assets/css', ASSETS_DIR . 'css'], 
            [SERVICE_MY_URL . 'assets/css', ASSETS_URL . 'css'])) {
                
            echo '<link rel="stylesheet" href="' . $fn . '?' . ALBIREO_VERSION . '">';
        }
    }
}

// внешние css
// css.lazy.url[]: https://site.com/style.css
echo implode(getKeysPageData('css.lazy.url', '<link rel="stylesheet" href="[val]">'));

# end of file
