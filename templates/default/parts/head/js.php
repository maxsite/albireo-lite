<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// Подключение разных js-файлов в HEAD
// JS-файлы могут быть либо в SERVICE_MY_DIR/assets/js/ (приоритет) либо в ASSETS_DIR/js текущего шаблона

// js.head[]: my.js

// use.alpine: +
// use.alpine.old: + # больше не поддерживается

# содержит Alpine и плагины: anchor morph mask collapse intersect persist resize 
// use.alpine.plugins: +

// use.alpine.plugin[sort]: +
// use.alpine.plugin[focus]: +
# плагины: sort focus anchor morph mask collapse intersect persist resize (_resources/alpine/plugins/)

// alpine плагины подключаем раньше других, чтобы их можно было использовать последующим скриптам
//  _resources/alpine/plugins/PLUGIN.min.js
// use.alpine.plugin[-PLUGIN-]: +
if ($plugins = getKeysPageData('use.alpine.plugin', '')) {
    foreach ($plugins as $plugin => $on) {
        if (checkStr($on) === true) {
            $file = RESOURCES_DIR . 'alpine' . DIRECTORY_SEPARATOR . 'plugins' . DIRECTORY_SEPARATOR . $plugin . '.min.js';
            if (file_exists($file))
               echo '<script src="' . RESOURCES_URL . 'alpine/plugins/' . $plugin . '.min.js?' . ALBIREO_VERSION . '" defer></script>';
        }
    }
}

// js.head[]: my.js
if ($files = getKeysPageData('js.head', '[val]')) {
    foreach ($files as $file) {
        if ($fn = findFile($file, 
            [SERVICE_MY_DIR . 'assets/js', ASSETS_DIR . 'js'], 
            [SERVICE_MY_URL . 'assets/js', ASSETS_URL . 'js'])) {
            
            echo '<script src="' . $fn . '?' . ALBIREO_VERSION . '"></script>';
        }
    }
}

// js.head.url[]: https://site.com/my.js
echo implode(getKeysPageData('js.head.url', '<script src="[val]"></script>'));

// alpine подключаем именно здесь, чтобы разрешить предварительную загрузку других alpine-плагинов перед ней
// use.alpine.plugins: +
// use.alpine: +
if (checkStr(getPageData('use.alpine.plugins', false)) === true)
    echo '<script src="' . RESOURCES_URL . 'alpine/alpine-plugins.min.js?' . ALBIREO_VERSION . '" defer></script>';
elseif (checkStr(getPageData('use.alpine', false)) === true)
    echo '<script src="' . RESOURCES_URL . 'alpine/alpine.min.js?' . ALBIREO_VERSION . '" defer></script>';

// выводятся в исходном виде в <script>
// js.fscript[]: head.js
// js.fscript[]: my.js
if ($files = getKeysPageData('js.fscript', '[val]')) {
    echo '<script>';
    
    foreach ($files as $file) {
        if ($fn = findFile($file, [SERVICE_MY_DIR . 'assets/js', ASSETS_DIR . 'js'])) {
            echo trim(file_get_contents($fn));
        }
    }
    
    echo '</script>';
}


# end of file
