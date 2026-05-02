<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

/*
Вывод навигации nav-top: +
Записи выводятся с типом type: blog
Сортировка по дате публикации date: дата
*/

// если тип записи особенный то не выводить
if (getPageData('type') == 'system') return;

// если опция явно не включена, то выходим
if (checkStr(getPageData('nav-top', false)) !== true) return;

$np = nextPrev();

if (!$np) return;

echo tpl(data: $np, tpl: TPL_DIR . 'nav-top.php');

# end of file
