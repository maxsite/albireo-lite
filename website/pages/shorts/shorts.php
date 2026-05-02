<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Shorts
description: [title]
slug: shorts
head-meta[robots]: noindex
type: system
user-level: admin

**/

if (noUserAccess(extras: 'access-denied.php')) return;

$rows = getPages(
    limit: 30,
    where: 'type = :type',
    order: 'date_unix DESC',
    bindValue: [':type' => 'shorts'],
    );

if (!$rows['files']) {
    header('HTTP/1.0 404 Not Found');
    echo '<h1>Ничего не найдено...</h1>';
} else {
    echo tpl(data: $rows['files'], tpl: TPL_DIR . 'shorts.php');
    echo tpl(data: $rows['pagination'], tpl: TPL_DIR . 'pagination1.php');
}

# end of file
