<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: <?= lang('Sitemap') ?>
description: [title]
slug: sitemap
type: system
pagination-format: [NBSP] - <?= lang('page') ?> %d

**/

$pages = getPages(limit: getConfig('sitemap-limit', 50));

$allCount = $pages['pagination']['records'];

$out = '';
$oldM = '';
$curM = '';

foreach($pages['files'] as $file => $info) {

    $slug = $info['slug'];

    if ($slug == '404') continue; // исключить 404
    if ($slug == '/') continue; // главная
    if (isset($info['method']) and strtoupper($info['method']) !== 'GET') continue;

    // пропускаем те, где явно отмечено sitemap: 0
    if (checkArrVal($info, 'sitemap', true) === false) continue;

    if (isset($info['date'])) {
        $date = ' <span class="t90 t-primary400">➝ ' . convertDate($info['date'], 'd-m-Y') . '</span>';
        $curM = convertDate($info['date'], 'm/Y'); // год и месяц для группировки по месяцам
    } else {
        $date = '';
    }
    
    if ($curM != $oldM) $out .= '<li class="h4 mar20-t" style="list-style: none; margin-left: -20px;">' . $curM . '</li>';
    
    $oldM = $curM;
    
    $add = '';
    
    if (!empty($info['category'])) {
        $add .= ' <span class="bi-folder t90 mar10-l t-primary400">' . categoryLinks($info['category'], ', ', 't90 t-primary500 dark:t-primary400') . '</span>';
    }
    
    if (!empty($info['tags'])) {
        $add .= ' <span class="bi-bookmarks t90 mar10-l t-primary400">' . tagLinks($info['tags'], ', ', 't90 t-primary500 dark:t-primary400') . '</span>';
    }
    
    $out .= '<li><a href="' . $info['page-url'] . '">' . htmlspecialchars($info['title']) . $date . '</a>' . $add . '</li>';
}
?>

h1(mar20-t) <?= getPageData('title') ?> <sup class="t100 t-gray500"><?= $allCount ?></sup>

<ul class="mar30-b"><?= $out ?></ul>

<?= tpl(data: $pages['pagination'], tpl: TPL_DIR . getConfig('pagination', 'pagination1.php')); ?>
