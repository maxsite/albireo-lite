<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**
# меняем title в зависимости от языка и первого сегмента URL
# title: <?= CURRENT_URL['segment1'] ? lang('Tag') . ': «' . CURRENT_URL['segment1'] . '»' : lang('Tags') ?>
title: <?= CURRENT_URL['segment1'] ? lang('Tag') . ': «' . implode("/", array_slice(CURRENT_URL['segments'], 1)) . '»' : lang('Tags') ?>
description: [title]

slug: tags
slug-pattern: tags/(.*?)

# layout: sidebar.php
type: system

pagination-format: [NBSP] - <?= lang('page') ?> %d

**/

// на странице tag выводим просто список всех меток
// на странице tag/метка выводим записи этой метки с пагинацией
        
// выносим переменные для настроек
$limit = 10; // кол-во записей на одной странице пагинации

// $seg = CURRENT_URL['segments'][1] ?? ''; // второй сегмент url tags/Астрономия
$seg = implode("/", array_slice(CURRENT_URL['segments'], 1)); // смотрим все сегменты кроме первого

if (!$seg) { 
    // нет сегмента получаем все метки, что используются в записях
    $tags = tagGetAll();

    if (!$tags) { // нет меток
        header('HTTP/1.0 404 Not Found');
        echo extras('not-found.php');
    } else {
        echo tpl(data: ['tags' => $tags, 'basePath' => SITE_URL . 'tags/'], tpl: TPL_DIR . 'tag-cloud.php');
    }
} else {
    // есть сегмент, получаем его страницы
    $rows = tagGetPages($seg, $limit);

    if (!$rows['files']) {
        header('HTTP/1.0 404 Not Found');
        echo extras('not-found.php');
    } else {
        echo tpl(data: $rows['files'], add: ['header' => getPageData('title')], tpl: TPL_DIR . 'one-column-3.php');
        echo tpl(data: $rows['pagination'], tpl: TPL_DIR . getConfig('pagination', 'pagination1.php'));
    }
}

# end of file
