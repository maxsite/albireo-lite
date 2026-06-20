<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Notes
slug: notes
head-meta[robots]: noindex
type: system

user-level: admin
no-user-access: +

**/

$rows = getPages(
    limit: 30,
    where: 'draft = 0 AND type = :type',
    order: 'subdirs ASC, date_unix DESC',
    bindValue: [':type' => 'notes'], 
    );

if (!$rows['files']) {
    header('HTTP/1.0 404 Not Found');
    echo extras('not-found.php');
    return;
} else {
    echo tpl(data: $rows['files'], add: ['nolang' => true, 'headerBlock' => 'Notes', 'delStrFolder' => 'notes/'], tpl: TPL_DIR . 'folders.php');
    echo tpl(data: $rows['pagination'], tpl: TPL_DIR . getConfig('pagination', 'pagination1.php'));
}

# end of file
