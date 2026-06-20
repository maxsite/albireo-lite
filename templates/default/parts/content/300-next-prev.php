<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// ссылки на следующую - предыдущую запись
// если нет занятой, то это файл конфигурации
// next-prev: [config-dir]order-my.php

// если есть запятая, то это slug записей «prev, next»
// если какой-то страницы нет, то указывается ведущяя или конечная запятая
// next-prev: demo/astronomy/a1, demo/astronomy/a3
// next-prev: , demo/astronomy/a3
// next-prev: demo/astronomy/a1,


// если тип записи не blog то не выводить
if (getPageData('type') == 'system') return;

$pageData = getVal('pageData');

// если нет поля next-prev, то выходим
if (empty($pageData['next-prev'])) return;

$order = $pageData['next-prev'] ?? false;

// pr($order);

$slug = $pageData['slug']; // текущая страница
$next = $prev = '';

if (strpos($order, ',') === false) {
    // нет запятой это файл конфигурации
    $order = ($order and file_exists($order)) ? getConfigFile($order) : [];
    
    $index = array_search($slug, $order);

    if ($index !== false) {
        $prev = ($index > 0) ? $order[$index - 1] : '';
        $next = isset($order[$index + 1]) ? $order[$index + 1] : '';
    }
} else {
    // есть запятая, смотрим что там за элементы
    $order = explode(',', $order);
    
    if (count($order) < 2) return; // должно быть минимум два элемента
    $prev = trim($order[0]);
    $next = trim($order[1]);
}

// pr($prev, $next);
// pr($order);

// если адреса пустые, то выходим
if (!$prev and !$next) return '';

$np = [];
$np['prev_file'] = $np['prev_title'] = $np['prev_url'] = $np['prev_image'] = '';
$np['next_file'] = $np['next_title'] = $np['next_url'] = $np['next_image'] = '';

// найти файлы с указанными slug
$db = getDB('filesinfo', true);

$rows = \Pdo\PdoQuery::fetchAll($db, "SELECT file, title, header, page_url, image_large FROM file_info WHERE slug = :slug AND type = :type AND draft = 0;", [':slug' => $next, ':type' => 'blog']);

if ($rows) {
    $np['prev_file'] = $rows[0]['file'];
    $np['prev_title'] = $rows[0]['header'] ?: $rows[0]['title'];
    $np['prev_url'] = $rows[0]['page_url'];
    $np['prev_image'] = $rows[0]['image_large'];
}

$rows = \Pdo\PdoQuery::fetchAll($db, "SELECT file, title, header, page_url, image_large FROM file_info WHERE slug = :slug AND type = :type AND draft = 0;", [':slug' => $prev, ':type' => 'blog']);

if ($rows) {
    $np['next_file'] = $rows[0]['file'];
    $np['next_title'] = $rows[0]['header'] ?: $rows[0]['title'];
    $np['next_url'] = $rows[0]['page_url'];
    $np['next_image'] = $rows[0]['image_large'];
}

echo tpl(data: $np, tpl: TPL_DIR . 'next-prev.php');

# end of file
