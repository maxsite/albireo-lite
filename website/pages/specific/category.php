<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: <?= lang('Categories') ?>
description: [title]
slug: category
slug-pattern: category/(.*?)

type: system

# функция нужна, чтобы изменить в HEAD title и description под конкретную рубрику
triggers[]: categoryTitleTriggers

pagination-format: [NBSP] - <?= lang('page') ?> %d

# catTitleFormat: <?= lang('Category') ?>: «%s»

**/

$categories = categoryGetAll();

if (!$categories) {
    // если нет рубрик на сайте, то просто выходим
    header('HTTP/1.0 404 Not Found');
    echo extras('not-found.php');
    return;
}

// смотрим все сегменты кроме первого
$seg = implode("/", array_slice(CURRENT_URL['segments'], 1)); 

$catConfig = getConfigFile(CONFIG_DIR . 'category.php');

if (!$seg) { 
    // нет сегмента, выводим список рубрик
    if (isset($catConfig['*']['text-start']))
        echo str_replace('///', LF, $catConfig['*']['text-start']) . LF;
    
    // получим последние 11 записей этой рубрики
    $limit = 11;
    
    foreach ($categories as $catSlug => $catData) {
        $rows = categoryGetPages($catSlug, $limit, sqlResult: true);
        
        if ($rows['files']) 
            $categories[$catSlug]['pages'] = $rows['files'];
        else
            $categories[$catSlug]['pages'] = [];
    }
    
    echo tpl(data: $categories, tpl: TPL_DIR . 'category.php');

    if (isset($catConfig['*']['text-end']))
       echo str_replace('///', LF, $catConfig['*']['text-end']) . LF;
} else {
    // есть сегмент
    if (isset($categories[$seg])) {
        // есть рубрика, нужно получить её записи
        $limit = $categories[$seg]['limit'] ?? 10;
        $rows = categoryGetPages($seg, $limit);

        if (!$rows['files']) {
            header('HTTP/1.0 404 Not Found');
            echo extras('not-found.php');
        } else {
            $header = '';
            
            if (isset($catConfig[$seg]['text-start'])) {
                echo str_replace('///', LF, $categories[$seg]['text-start']) . LF;
            } else {
                $header = getPageData('title');
            }
            
            echo tpl(data: $rows['files'], add: ['header' => $header], tpl: TPL_DIR . 'one-column-3.php');
            echo tpl(data: $rows['pagination'], tpl: TPL_DIR . getConfig('pagination', 'pagination1.php'));
        }
    } else {
        // нет такой рубрики на сайте
        header('HTTP/1.0 404 Not Found');
        echo extras('not-found.php');
    }
}

# end of file
