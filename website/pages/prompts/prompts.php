<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Prompts for AI
description: [title]
slug: prompts
head-meta[robots]: noindex
type: system
user-level: admin
use.clipboard: +

**/

if (noUserAccess(extras: 'access-denied.php')) return;

$rows = getPages(
    limit: 30,
    where: 'type = :type',
    order: 'subdirs ASC, title ASC',
    bindValue: [':type' => 'prompts'],
    );

if (!$rows['files']) {
    header('HTTP/1.0 404 Not Found');
    echo '<h1>Ничего не найдено...</h1>';
} else {
    echo tpl(data: $rows['files'], tpl: TPL_DIR . 'prompts.php');
    echo tpl(data: $rows['pagination'], tpl: TPL_DIR . 'pagination1.php');
}

# end of file
