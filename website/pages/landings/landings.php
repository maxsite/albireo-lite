<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Landing pages

# !!! slug должен указывать на этот же каталог
slug: landings

type: system
head-meta[robots]: noindex

**/

$rows = getPages(
    limit: 0,
    where: 'draft = 0 AND type = :type',
    order: 'title ASC',
    bindValue: [':type' => 'landings'],
    );

if (!$rows['files']) {
    header('HTTP/1.0 404 Not Found');
    echo extras('not-found.php');
    return;
} else {
    echo tpl(data: $rows['files'], tpl: TPL_DIR . 'landing-list-images.php', add: ['header' => 'Landing pages <sup>' . count($rows['files']) . '</sup>']);
}

# end of file
