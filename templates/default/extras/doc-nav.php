<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

/*

extras.start[doc-nav.php]: +
extras.end[doc-nav.php]: +

*/

$cache = getVal('doc-nav');

if (!$cache) {
    $options = getConfigFile(CONFIG_DIR . getPageData('doc.config', 'doc2.php'));

    if (!$options) return;

    $type = $options['type'] ?? 'doc';
    $path = getPageData('doc.menu.path', '01_General');
    $groupA = explode('.', $path);
    $group = $groupA[0] ?? '';

    // приоритет сортировки — имя файла, потом поле doc.menu.path
    // получаем только текущую группу
    $rows = getPages(
        limit: 0,
        where: "draft = 0 AND type = :type and doc_menu_path LIKE :group ESCAPE '/'",
        order: 'file ASC, doc_menu_path ASC',
        bindValue: [':type' => $type, ':group' => $group . '%'],
        sqlResult: true
    );

    $pages = $rows['files'];

    // pr($pages);

    $result = arrayFindPrevNext($pages, getPageData('slug'), 'slug');

    setVal('doc-nav', $result);
} else {
    $result = $cache;
}

if (!$result) return;

// pr($result);

$next_url = $next_title = $prev_url = $prev_title = '';

if (!empty($result['next'])) {
    $next_url = $result['next']['page_url'] ?? '';
    $next_title = $result['next']['title'] ?? '';
}

if (!empty($result['prev'])) {
    $prev_url = $result['prev']['page_url'] ?? '';
    $prev_title = $result['prev']['title'] ?? '';
}

?>
<nav class="flex flex-wrap mar20-tb">
    <div class="w6col pad10-r">
    {@if $prev_url}
         <a class="icon-arrow-left" href="{{ $prev_url }}">{{ $prev_title }}</a>
    {@endif}
    </div>
    <div class="w6col t-right">
    {@if $next_url}
        <a class="icon-arrow-right" href="{{ $next_url }}">{{ $next_title }}</a>
    {@endif}
    </div>
</nav>