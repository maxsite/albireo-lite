<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

/*
Ссылки сразу после текста.

# заголовок блока
links.title: Связанные ссылки

# отключить заголовок блока
links.title: 

# если links.title нет, то выводится текст «Связанные ссылки»

links:
 - about
 - berry-design | Пример дизайна Berry CSS
 - https://maxsite.org/ | Мой сайт | rel="nofollow" target="_blank"
*/

$links = getPageData('links');

if (!$links) return;

$linksTitle = getPageData('links.title', false);

if ($linksTitle === false) {
    echo '<div class="h3">' . lang('Related Links') . '</div>';
} elseif ($linksTitle) {
    echo '<div class="h3">' . $linksTitle . '</div>';
}

echo '<ul class="mar0-t">';

foreach ($links as $link) {
    $linkArray = strExplode($link, sep: '|');
    
    $href = $linkArray[0] ?? '';
    $name = $linkArray[1] ?? $href;
    $attr = $linkArray[2] ?? '';

    if (!str_starts_with($href, 'http')) $href = SITE_URL . $href;
    
    echo '<li><a href="' . htmlspecialchars($href) . '" ' . $attr . '>' . htmlspecialchars($name) . '</a></li>';
}

echo '</ul>';

# end of file
