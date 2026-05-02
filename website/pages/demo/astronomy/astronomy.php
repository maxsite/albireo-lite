<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Астрономия
description: Много полезного материала об астрономии
slug: astronomy
head-meta[robots]: noindex
layout-subtitle: Астрономия
type: system
images-dir: [current-path]images

**/

// здесь нужно вывести только одну рубрику, которая совпадает с текущим каталогом
$category = basename(__DIR__); // рубрика совпадает с именем каталога

$rows = categoryGetPages($category, 10);

if (!$rows['files']) {
    header('HTTP/1.0 404 Not Found');
    echo extras('not-found.php');
    return;
} else {
    echo tpl(data: $rows['files'], add: ['header' => getPageData('title')], tpl: TPL_DIR . 'one-column-3.php');
    echo tpl(data: $rows['pagination'], tpl: TPL_DIR . getConfig('pagination', 'pagination1.php'));
}

# end of file
