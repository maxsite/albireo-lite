<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// блок вывода контента

echo getPageData('layout-content-start', '');

if ($_content_files = findFilesFromDirs('[!_]*.php', TEMPLATE_PARTS_DIR . 'content-start', SERVICE_MY_DIR . 'parts/content-start')) {
    foreach($_content_files as $_file) requireSafe($_file);
    unset($_content_files, $_file);
}

$_allow_read_draft = !(checkStr(getPageData('draft')) and !checkUserAccess(['draft', 'admin']));
$_main_grid = false;

if (checkStr(getPageData('main-grid'))) {
    $_main_grid = [
        'container_class' => getPageData('main-grid.container.class', 'grid-var gap20 grid-1col-tablet'),
        'container_style' => getPageData('main-grid.container.style', '--grid-columns: auto minmax(150px, 30%);'),
        'content_class' => getPageData('main-grid.content.class', ''),
        'aside_class' => getPageData('main-grid.aside.class', ''),
        'aside_html' => getPageData('main-grid.aside.html', '', LF, LF),
        'aside_extras' => getPageData('main-grid.aside.extras', '')
    ];

    if (!$_main_grid['aside_html'] and !$_main_grid['aside_extras']) $_main_grid = false;
}

echo '<main>' . LF;

if ($_main_grid) echo '<div class="' . $_main_grid['container_class'] . '" style="' . $_main_grid['container_style'] . '"><div id="page_content" class="' . $_main_grid['content_class'] . '">';

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

if ($_main_grid) echo '</div><aside class="' . $_main_grid['aside_class'] . '">' . $_main_grid['aside_html'] . extras($_main_grid['aside_extras']) . '</aside></div>';

echo LF . '</main>';

unset($_allow_read_draft, $_main_grid);

if ($_content_files = findFilesFromDirs('[!_]*.php', TEMPLATE_PARTS_DIR . 'content', SERVICE_MY_DIR . 'parts/content')) {
    foreach($_content_files as $_file) requireSafe($_file);
    unset($_content_files, $_file);
}

echo getPageData('layout-content-end', '');

# end of file