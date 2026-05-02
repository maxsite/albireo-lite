<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

/*
Вывод блока похожих записей

other-pages: -   отключить блок
other-pages: Похожие записи
other-pages:     без заголовка

записи случайно, но учитывается текущая рубрика category:
Если записей меньше 3, то учитывается только текущая tags:
Если записей меньше 3, то ничего не выводится

*/

$minimum = 3; // минимальное кол-во файлов в каждом блоке поиске
$limit = 6; // итоговое кол-во файлов

$pageData = getVal('pageData');

if (!isset($pageData['type'])) return; // если тип записи не блоговый то ничего не выводить
if ($pageData['type'] != 'blog') return; // если тип записи не блоговый то ничего не выводить

// если опция явно отключена
if (checkStr(getPageData('other-pages', false)) === false) return;

// сразу получим все возможные критерии поиска
$categorys = $pageData['category'] ?? false;
$tags = $pageData['tags'] ?? false;

// не выводим текущую страницу
$thisPage = $pageData['page-url'];

// итоговый массив
$files = [];

$db = getDB('filesinfo', true);

if (!$files and $categorys) {
    $categorys = strExplode($categorys);
    
    $bind = \Pdo\PdoQuery::buildNamedPlaceholders($categorys, 'cat');

    $files = \Pdo\PdoQuery::fetchAll($db,
       'SELECT title, header AS page_header, page_url, image_large
        FROM file_info
        WHERE draft = 0 AND type = "blog" AND page_url != :this_page AND json_valid(category)
            AND EXISTS (
                SELECT 1 FROM json_each(category)
                WHERE value IN (' . $bind['string'] . ') COLLATE NOCASE
            )
        ORDER BY RANDOM()
        LIMIT :limit;',

        [':this_page' => $thisPage, ':limit' => $limit] + $bind['binds']
    );

    // если записей меньше $minimum, то обнуляем массив
    if (count($files) < $minimum) $files = [];
}

if (!$files and $tags) {
    $tags = strExplode($tags);
    
    $bind = \Pdo\PdoQuery::buildNamedPlaceholders($tags, 'tag');

    $files = \Pdo\PdoQuery::fetchAll($db,
       'SELECT title, header AS page_header, page_url, image_large
        FROM file_info
        WHERE draft = 0 AND type = "blog" AND page_url != :this_page AND json_valid(tags)
            AND EXISTS (
                SELECT 1 FROM json_each(tags)
                WHERE value IN (' . $bind['string'] . ') COLLATE NOCASE
            )
        ORDER BY RANDOM()
        LIMIT :limit;',

        [':this_page' => $thisPage, ':limit' => $limit] + $bind['binds']
    );

    // если записей меньше $minimum, то обнуляем массив
    if (count($files) < $minimum) $files = [];
}

if ($files) {
    $header = $pageData['other-pages'] ?? '';
    echo tpl(data: $files, tpl: TPL_DIR . 'other-pages.php', add: ['header' => $header]);
}

# end of file
