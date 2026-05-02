<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// это подключение разных js-файлов в конце BODY
// js.lazy[]: my.js
// js.lazy: my.js
// js.lazy.url[]: https://site.com/my.js

// js.lazy[]: my.js
if ($file = getPageData('js.lazy') and checkStr($file)) {
    if (file_exists(ASSETS_DIR . 'js' . DIRECTORY_SEPARATOR . $file))
       echo '<script src="' . ASSETS_URL . 'js/' . $file . '?' . ALBIREO_VERSION .'"></script>';
}

// js.lazy: my.js
if ($files = getKeysPageData('js.lazy', '[val]')) {
    foreach ($files as $file) {
        if (file_exists(ASSETS_DIR . 'js' . DIRECTORY_SEPARATOR . $file))
            echo '<script src="' . ASSETS_URL . 'js/' . $file . '?' . ALBIREO_VERSION . '"></script>';
    }
}

// js.lazy.url[]: https://site.com/my.js
echo implode(getKeysPageData('js.lazy.url', '<script src="[val]"></script>'));

# end of file
