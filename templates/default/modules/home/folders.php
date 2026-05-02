<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$rows = getPages(
    limit: 0,
    where: 'draft = 0 AND type = :type',
    order: 'subdirs ASC, file ASC, date_unix DESC',
    bindValue: [':type' => 'blog'],
);

// pr($rows['files']);

// выделяем последние 10 записей меткой new
$recent = getPages(
    limit: 10,
    where: 'draft = 0 AND type = :type',
    bindValue: [':type' => 'blog'],
    order: 'date_unix DESC',
    sqlResult: true,
);

// pr($recent['files']);

foreach ($recent['files'] as $el) {
    if (isset($rows['files'][$el['file']]))
        $rows['files'][$el['file']]['_new'] = 1;
    else
        $rows['files'][$el['file']]['_new'] = 0;
}

// echo '<h1>Folders <sup class="t80 va-super">' . count($rows['files']) . '</sup></h1><hr>';
echo tpl(data: $rows['files'], tpl: TPL_DIR . 'folders.php');

# end of file
