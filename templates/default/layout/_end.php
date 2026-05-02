<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// отладочная панель Albireo CMS
debugPanel(); 
echo getPageData('layout-end', '');
echo implode(getKeysPageData('lazy', '[val]'));

if ($_content_files = findFilesFromDirs('[!_]*.php', TEMPLATE_PARTS_DIR . 'lazy', SERVICE_MY_DIR . 'parts/lazy')) {
    foreach($_content_files as $_file) requireSafe($_file);
    unset($_content_files, $_file);
}

?></body></html>