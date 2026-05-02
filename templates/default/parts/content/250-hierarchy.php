<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

/*
hierarchy: t.04
hierarchy-title: <div class="t130 mar30-t mar5-b">Ещё записи по теме</div>
*/

// если тип записи особенный то не выводить
if (getPageData('type') == 'system') return;

$pageData = getVal('pageData');

if (empty($pageData['hierarchy'])) return; // нет поля hierarchy, выходим

$structure = explode('.', $pageData['hierarchy']); // t.04 [t, 04]

if (empty($structure[0])) return; // нет корневого элемента, выходим

$root = $structure[0]; // корень навигации

$rows = getPages(
    limit: 0,
    where: 'draft = 0 AND type = :type AND hierarchy LIKE :hierarchy',
    order: 'hierarchy ASC, title ASC',
    bindValue: [':type' => 'blog', ':hierarchy' => '%' . $root . '.%'],
    );

$files = $rows['files'];
// pr($files);

if ($files) {
    $currentUrl = getPageData('page-url');

    if (isset($pageData['hierarchy-title'])) echo $pageData['hierarchy-title'];

    foreach($files as $data) {
        $title = htmlspecialchars(choiceKey($data, 'header', 'title', 'slug') ?? '');
        
        // уровень вложенности, как кол-во точек t.1.5 => 2
        $pathLevel = substr_count($data['hierarchy'], '.') - 1;
        
        if ($currentUrl != $data['page-url'])
            echo '<div class="mar10-l" style="padding-left: ' . (30 * $pathLevel) . 'px">• <a href="' . $data['page-url'] . '">' . $title . '</a></div>';
        else
            echo '<div class="mar10-l" style="padding-left: ' . (30 * $pathLevel) . 'px">• ' . $title . '</div>';
    }
}

# end of file
