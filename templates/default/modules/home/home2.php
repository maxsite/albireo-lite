<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$homeTPLfile = getConfig('homeTPLfile', 'group-2.php');

// делим записи по группам 5 = 2 + 3
$result = getPages(limit: getConfig('homeLimitPagination2', 10));

$files = $result['files'];

$arrayChunk = array_chunk($files, 5, true);

foreach($arrayChunk as $a) {
    echo tpl(data: $a, tpl: TPL_DIR . $homeTPLfile, add: ['before' => '<br>', 'header' => '', 'description' => '']) . '<br>';
}

echo tpl(data: $result['pagination'], tpl: TPL_DIR . 'pagination1.php');

# end of file
