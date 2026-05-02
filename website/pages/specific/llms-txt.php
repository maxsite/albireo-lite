<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

layout: empty.php
slug: llms.txt
title: llms.txt
type: system
compress: -
parser: -

**/

//  https://you-site/llms.txt
//  исключить страницу llms: -

$result = '# ' . getConfig('siteTitle') . LF . LF . '> ' . getConfig('siteDescription') . LF . LF;

$category = categoryGetAll();

// если есть рубрики, то формируем файл через них
// если рубрик нет, то просто выводим записи списком
if ($category) {
    foreach ($category as $cat => $data) {
        if ($catConfig = getConfigFile(CONFIG_DIR . 'category.php', $cat)) {
            $result .= LF . '## Рубрика: ' . $catConfig['title'] . LF;

            if ($catConfig['description'] and $catConfig['description'] != $catConfig['title'])
                $result .= '> ' . $catConfig['description'] . LF;

            $result .= LF;
        } else {
            // если нет рубрики в конфиге
            $result .= LF . '## Рубрика: ' . $cat . LF . LF;
        }

        // $pages = getPages(
        //         limit: 1000,
        //         where: 'draft = 0 AND type != "system" AND category LIKE :category',
        //         order: 'date_unix DESC',
        //         bindValue: [':category' => '%#' . $cat . '#%'],
        // );
        
        $pages = categoryGetPages($cat, 1000);

        if ($pages['files']) {
            foreach ($pages['files'] as $page) {
                if ($page['slug'] == '404') continue;
                if ($page['slug'] == '/') continue;
                if (!isset($page['type'])) continue;
                if (isset($page['method']) and strtoupper($page['method']) !== 'GET') continue;
                if (checkArrVal($page, 'llms', true) === false) continue;
                
                $title = $page['title'] ?? '';
                
                if (!$title) continue;
                
                $date = $page['date.unix'] > 1 ? '  date: ' . date('Y-m-d', $page['date.unix']) . LF : '';
                $tags = !empty($page['tags']) ? '  tags: ' . implode(', ', strExplode($page['tags'])) . LF : '';

                if ($desc = choiceKey($page, 'llms', 'announce', 'description', 'title'))
                    $desc = '  ' . $desc . LF;

                $result .= '- [' . $title . '](' . $page['page-url'] .')' . LF . $date . $tags . $desc . LF;
            }
        }

        $result .= LF;
    }
} else {
    $pages = getPages(limit: 1000, where: 'draft = 0 AND type != "system"');

    foreach ($pages['files'] as $file => $page) {
        if ($page['slug'] == '404') continue;
        if ($page['slug'] == '/') continue;
        if (!isset($page['type'])) continue;
        if (isset($page['method']) and strtoupper($page['method']) !== 'GET') continue;
        if (checkArrVal($page, 'llms', true) === false) continue;
        
        $title = $page['title'] ?? '';
        
        if (!$title) continue;
            
        $date = $page['date.unix'] > 1 ? '  date: ' . date('Y-m-d', $page['date.unix']) . LF : '';
        $tags = !empty($page['tags']) ? '  tags: ' . implode(', ', strExplode($page['tags'])) . LF : '';

        if ($desc = choiceKey($page, 'llms', 'announce', 'description', 'title'))
            $desc = '  ' . $desc . LF;

        $result .= '- [' . $title . '](' . $page['page-url'] .')' . LF . $date . $tags . $desc . LF;
    }
}

@header('Content-Type: text/plain; charset=utf-8');
@header('Content-Disposition: inline');

echo $result;

# end of file
