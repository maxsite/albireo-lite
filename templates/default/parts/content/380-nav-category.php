<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

/*
Вывод навигации nav-category: +
Записи выводятся с типом type: blog
Сортировка по рубрике + дата публикации
*/

// если тип записи особенный то не выводить
if (getPageData('type') == 'system') return;

// если опция явно не включена, то выходим
if (checkStr(getPageData('nav-category', false)) !== true) return;

$np = nextPrevCategory();

if (!$np) return;

echo tpl(data: $np, tpl: TPL_DIR . 'nav-top.php');

# end of file
