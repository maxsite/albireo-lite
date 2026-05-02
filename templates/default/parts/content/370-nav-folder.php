<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

/*
Вывод навигации nav-folder: +
Записи выводятся с типом type: blog
Сортировка по имени файла
*/

// если тип записи особенный то не выводить
if (getPageData('type') == 'system') return;

// если опция явно не включена, то выходим
if (checkStr(getPageData('nav-folder', false)) !== true) return;

$subdirs = getPageData('subdirs');
$thisFile = getPageData('this-file');

$rows = getPages(
    limit: 0,
    where: 'draft = 0 AND type = :type AND subdirs = :subdirs',
    order: 'subdirs ASC, file DESC, date_unix DESC',
    bindValue: [':type' => 'blog', ':subdirs' => $subdirs],
    sqlResult: true
    );

// pr($rows['files']);


$nav = arrayFindPrevNext($rows['files'], getPageData('this-file'), 'file');
// pr($nav);

$np = [];

$np['prev_file'] = $nav['prev']['file'] ?? '';
$np['prev_url'] = $nav['prev']['page_url'] ?? '';
$np['prev_title'] = choiceKeyStr($nav['prev'], 'header', 'title') ?? '';

$np['next_file'] = $nav['next']['file'] ?? '';
$np['next_url'] = $nav['next']['page_url'] ?? '';
$np['next_title'] = choiceKeyStr($nav['next'], 'header', 'title') ?? '';

echo tpl(data: $np, tpl: TPL_DIR . 'nav.php');

# end of file
