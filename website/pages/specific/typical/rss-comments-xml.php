<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

layout: empty.php
slug: rss-comments.xml
title: rss-comments.xml
type: system
compress: -
parser: -

**/

// rss для всех последних комментариев сайта
// https://you-site/rss-comments.xml

// https://www.rssboard.org/rss-specification
// https://www.rssboard.org/files/sample-rss-2.xml

// всего записей в RSS ленте
$limit = getConfig('rssLimitComments', 10);

if ($limit < 1) return;

$lib = new \Comments\Comments;
$comments = $lib->lastComments($limit);
    
$out = '<rss version="2.0"><channel>' . LF;
$out .= '<title>' . htmlspecialchars(getConfig('siteTitle')) . ' (comments)</title>' . LF;
$out .= '<link>' . SITE_URL . '</link>' . LF;
$out .= '<description>' . htmlspecialchars(getConfig('siteDescription')) . '</description>' . LF;
$out .= '<copyright>Copyright ' . date('Y') . ', ' . SITE_URL . '</copyright>' . LF;

foreach ($comments as $id => $info) {
    $pageTitle = $info['pageTitle'] ?? '';
    
    // если нет заголовка, выходим — это скорее всего значит, что адрес страницы ошибочный
    if (!$pageTitle) continue;

    $description = $info['content'] ?? '';
    $author = $info['author'] ?? '';
    $mark = $info['mark'] ?? '';
    $link = $info['link'] ?? '';
    
    if ($author) $pageTitle = $author . ' > ' . $pageTitle;
    
    if ($mark) $mark = ' [<b><i>' . $mark . '</i></b>]';
    
    $description = '<p><b>' . $author . '</b>' . $mark . '</p><hr>' . $description;
    
    $out .= '<item>' . LF;
    $out .= '<title>' . htmlspecialchars($pageTitle) . '</title>' . LF;
    $out .= '<link>' . $link . '</link>' . LF;
    $out .= '<description>' . htmlspecialchars($description) . '</description>' . LF;
    $out .= '<pubDate>' . date('r', strtotime($info['date']))  . '</pubDate>' . LF;
    $out .= '</item>' . LF;
}

$out .= '</channel></rss>';

@header('Content-Type: application/xml; charset=utf-8');

echo $out;

# end of file
