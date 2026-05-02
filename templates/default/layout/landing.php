<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// layout: landing.php

// вывод контента почти как и _content.php, только без ARTICLE
// здесь нет вывода шапок и подвала

if (noUserAccessFull()) return;

require __DIR__ . '/_start.php';

echo getPageData('layout-content-start', '');

if ($_content_files = findFilesFromDirs('[!_]*.php', TEMPLATE_PARTS_DIR . 'content-start', SERVICE_MY_DIR . 'parts/content-start')) {
    foreach($_content_files as $_file) requireSafe($_file);
    unset($_content_files, $_file);
}

$_allow_read_draft = !(checkStr(getPageData('draft')) and !checkUserAccess(['draft', 'admin']));

if (checkStr(getPageData('content-separate')) === true) {
    if ($_allow_read_draft)
        echo getVal('pageFileContent', '');
    else
        echo extras('access-denied.php');
} else {
    if ($_allow_read_draft)
        requireSafe(getVal('pageFile'));
    else
        echo extras('access-denied.php');
}

unset($_allow_read_draft);

if ($_content_files = findFilesFromDirs('[!_]*.php', TEMPLATE_PARTS_DIR . 'content', SERVICE_MY_DIR . 'parts/content')) {
    foreach($_content_files as $_file) requireSafe($_file);
    unset($_content_files, $_file);
}

echo getPageData('layout-content-end', '');
require __DIR__ . '/_end.php';

# end of file
