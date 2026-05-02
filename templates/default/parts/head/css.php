<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

/*
Использование CSS

CSS-файлы могут быть либо в SERVICE_MY_DIR/assets/css/ (приоритет) либо в ASSETS_DIR/css текущего шаблона

css.theme: color-red.css            css/themes/color-red.css
css.theme[]: color-red.css          css/themes/color-red.css

css.root[body-font-family]: Lora  <STYLE> :root { } </STYLE>
css.root[body-size-base]: 16px

css.head[]: my.css            css/my.css
css.lazy[]: my.css            css/my.css

css.fonts: lora.css           css/fonts/lora.css
css.fonts[]: lora.css         css/fonts/lora.css

css.fonts.lazy: lora.css, exo2.css  css/fonts/lora.css & css/fonts/exo2.css
css.fonts.lazy[]: lora.css    css/fonts/lora.css

// внутри css-файла в может находится / *! @layout.fields * /
// если он есть, то это указывает, что файл формирует дизайн с боковыми полями
// тогда ставится флаг: setVal('layout.fields', $file);
css.layout: field.css, my-layout.css  <STYLE>  </STYLE>

css.fstyle: my.css, other.css  <STYLE>  </STYLE>
css.fstyle[]: my.css           <STYLE>  </STYLE>

css.style[]: li {margin-bottom: 20px}
css.style[]: hr {margin: 0 10px}

// или в виде многострочного текста
css.style[]: |
  li {margin-bottom: 20px}
  hr {margin: 0 10px}

// произвольный URL
css.head.url[]: https://site.com/style.css
css.head.url[]: [current-path]css/owl-carousel.css   // каталог текущей страницы

*/
// секция HEAD

// css themes хранятся в ASSETS_URL/css/themes/ТЕМА.css
// css.theme: red.css
if ($file = getPageData('css.theme', '-')) {
    if ($file !== '-') {
        if ($fn = findFile($file, 
            [SERVICE_MY_DIR . 'assets/css/themes', ASSETS_DIR . 'css/themes'], 
            [SERVICE_MY_URL . 'assets/css/themes', ASSETS_URL . 'css/themes'])) {

            echo '<link rel="stylesheet" href="' . $fn . '?' . ALBIREO_VERSION . '">';
        }
    }
}

// css.theme[]: color-red.css
if ($files = getKeysPageData('css.theme', '[val]')) {
    foreach ($files as $file) {
        if ($fn = findFile($file, 
            [SERVICE_MY_DIR . 'assets/css/themes', ASSETS_DIR . 'css/themes'], 
            [SERVICE_MY_URL . 'assets/css/themes', ASSETS_URL . 'css/themes'])) {

            echo '<link rel="stylesheet" href="' . $fn . '?' . ALBIREO_VERSION . '">';
        }
    }
}

// это подключение разных css-файлов из ASSETS_URL/css/fonts/*.css 
// https://maxsite.org/mf/fonts
// css.fonts: lora.css
if ($files = getPageData('css.fonts')) {
    foreach (strExplode($files) as $file) {
        if ($fn = findFile($file, 
            [SERVICE_MY_DIR . 'assets/css/fonts', ASSETS_DIR . 'css/fonts'], 
            [SERVICE_MY_URL . 'assets/css/fonts', ASSETS_URL . 'css/fonts'])) {
                
            echo '<link rel="stylesheet" href="' . $fn . '?' . ALBIREO_VERSION . '">';
        }
    }
}

// для удобства в виде [], чтобы не перебивать css.fonts
// css.fonts[]: opensans.css
// css.fonts[]: lora.css
if ($files = getKeysPageData('css.fonts', '[val]')) {
    foreach ($files as $file) {
        if ($fn = findFile($file, 
            [SERVICE_MY_DIR . 'assets/css/fonts', ASSETS_DIR . 'css/fonts'], 
            [SERVICE_MY_URL . 'assets/css/fonts', ASSETS_URL . 'css/fonts'])) {
                
            echo '<link rel="stylesheet" href="' . $fn . '?' . ALBIREO_VERSION . '">';
        }     
    }
}

// css.head[]: my.css
if ($files = getKeysPageData('css.head', '[val]')) {
    foreach ($files as $file) {
        if ($fn = findFile($file, 
            [SERVICE_MY_DIR . 'assets/css', ASSETS_DIR . 'css'], 
            [SERVICE_MY_URL . 'assets/css', ASSETS_URL . 'css'])) {
                
            echo '<link rel="stylesheet" href="' . $fn . '?' . ALBIREO_VERSION . '">';
        }
    }
}

// эти стили выводятся в исходном виде в <STYLE>
// css.layout: field.css, my-layout.css
if ($files = getPageData('css.layout') and checkStr($files)) {
    echo '<style>';
    foreach (strExplode($files) as $file) {
        if ($fn = findFile($file, [SERVICE_MY_DIR . 'assets/css', ASSETS_DIR . 'css'])) {
            $cont = strRemoveLF(file_get_contents($fn));
            
            // если есть вхождение в тексте @layout.fields
            // то это признак, что разметка имеет боковые поля
            // это может использоваться в модулях шапки и подвала
            if (strpos($cont, '@layout.fields') !== false) {
                setVal('layout.fields', $fn);
            }
            
            echo $cont;
        }
    }
    echo '</style>';
}

// эти стили выводятся в исходном виде в <STYLE>
// css.fstyle: my.css, other.css
if ($files = getPageData('css.fstyle') and checkStr($files)) {
    echo '<style>';
    
    foreach (strExplode($files) as $file) {
        if ($fn = findFile($file, [SERVICE_MY_DIR . 'assets/css', ASSETS_DIR . 'css'])) {
            echo strRemoveLF(file_get_contents($fn));
        }
    }
    
    echo '</style>';
}

// эти стили выводятся в исходном виде в <STYLE>
// в виде дополнительных файлов
// css.fstyle[]: my.css
// css.fstyle[]: other.css
if ($files = getKeysPageData('css.fstyle', '[val]')) {
    echo '<style>';
    
    foreach ($files as $file) {
        if ($fn = findFile($file, [SERVICE_MY_DIR . 'assets/css', ASSETS_DIR . 'css'])) {
            echo strRemoveLF(file_get_contents($fn));
        }
    }
    
    echo '</style>';
}

// внешние css
// css.head.url[]: https://site.com/style.css
echo implode(getKeysPageData('css.head.url', '<link rel="stylesheet" href="[val]">'));

// стили в зависимости от уровня доступа юзера
// если нет любого логина то будет .albireo-is-login
if (!getUser('login')) {
    echo '<style>.albireo-is-login {display: none}</style>';
}

// если не админ то будет .albireo-is-admin
if (!checkUserAccess('admin')) {
    echo '<style>.albireo-is-admin {display: none}</style>';
}

// <style>:root{ ... }</style>
// см. berry-vars.css
/*

css.root[body-font-family]: Lora
css.root[body-size-base]: 16px
css.root[body-color]: #333
css.root[body-bg]: #fff

Для шрифта нужно подключить его css-файл, например
css.fonts[]: lora.css
или 
css.fonts.lazy[]: lora.css
*/
$root = implode(getKeysPageData('css.root', '--[key]:[val];'));
if ($root) echo '<style>:root{' . $root . '}</style>';

// css.style[]: li {margin-bottom: 20px}
// css.style[]: li {color: #44b}
// css.style[]: |
//   li {margin-bottom: 20px}
//   hr {margin: 0 10px}
$style = implode(getKeysPageData('css.style', '[val]'));
if ($style) echo '<style>' . $style . '</style>';


# end of file
