<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// указывается спиппет для конца секции BODY
// snippet.lazy[counter]: +

if ($snippets = getKeysPageData('snippet.lazy', '')) {
    foreach ($snippets as $s => $on) {
        if (checkStr($on) === true) {
            echo snippet($s);
        }
    }
}

# end of file
