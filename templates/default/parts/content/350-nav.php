<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

/*
Вывод навигации nav: +
Записи выводятся с типом type: blog
Сортировка по дате публикации date: дата
*/

// если тип записи особенный то не выводить
if (getPageData('type') == 'system') return;

// если опция явно не включена, то выходим
if (checkStr(getPageData('nav', false)) !== true) return;

$np = nextPrev();

if (!$np) return;

echo tpl(data: $np, tpl: TPL_DIR . 'nav.php');

# end of file
