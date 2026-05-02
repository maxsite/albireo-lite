<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// указывается спиппет для секции HEAD
// snippet.head[favicon]: +
// snippet.head[counter]: +

if ($snippets = getKeysPageData('snippet.head', '')) {
    foreach ($snippets as $s => $on) {
        if (checkStr($on) === true) {
            echo snippet($s);
        }
    }
}

# end of file
