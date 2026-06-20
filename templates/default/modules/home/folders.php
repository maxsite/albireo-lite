<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

/*
в config.php:

'homeOutputModule' => 'home/folders.php',
   
// дополнительные параметры модуля
'moduleData[home/folders.php]' => ['headerBlock' => 'Notes', 'nolang' => true, 'delStrFolder' => 'notes/', 'noinfo' => true],
*/

$data = getConfig('moduleData[home/folders.php]', []);

$rows = getPages(
    limit: 0,
    where: 'draft = 0 AND type = :type',
    order: 'subdirs ASC, file ASC, date_unix DESC',
    bindValue: [':type' => 'blog'],
);

// выделяем последние 10 записей меткой new
$recent = getPages(
    limit: 10,
    where: 'draft = 0 AND type = :type',
    bindValue: [':type' => 'blog'],
    order: 'date_unix DESC',
    sqlResult: true,
);


foreach ($recent['files'] as $el) {
    if (isset($rows['files'][$el['file']]))
        $rows['files'][$el['file']]['_new'] = 1;
    else
        $rows['files'][$el['file']]['_new'] = 0;
}

// echo '<h1>Folders <sup class="t80 va-super">' . count($rows['files']) . '</sup></h1><hr>';

echo tpl(
    tpl: TPL_DIR . 'folders.php', 
    data: $rows['files'], 
    add: [
        'headerBlock' => $data['headerBlock'] ?? '', 
        'nolang' => $data['nolang'] ?? false,
        'delStrFolder' => $data['delStrFolder'] ?? '', 
        'noinfo' => $data['noinfo'] ?? false,
    ]);

# end of file
