<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

layout: empty.php
slug: rss.xml
title: rss.xml
type: system
compress: -
parser: -

**/

//  https://you-site/rss.xml
//  исключить страницу rss: -

// https://www.rssboard.org/rss-specification
// https://www.rssboard.org/files/sample-rss-2.xml

// всего записей в RSS ленте
$limit = getConfig('rssLimit', 10);

if ($limit < 1) return;

$out = '<rss version="2.0"><channel>' . LF;
$out .= '<title>' . htmlspecialchars(getConfig('siteTitle')) . '</title>' . LF;
$out .= '<link>' . SITE_URL . '</link>' . LF;
$out .= '<description>' . htmlspecialchars(getConfig('siteDescription')) . '</description>' . LF;
$out .= '<copyright>Copyright ' . date('Y') . ', ' . SITE_URL . '</copyright>' . LF;
$out .= '<generator>Albireo CMS</generator>' . LF;

$pages = getPages(limit: $limit, where: "draft = 0 AND type != 'system' AND rss = 1");
$files = $pages['files'];

$fieldImage = getConfig('rssAddImage', 'image-large');

foreach ($files as $file => $info) {

    if ($info['slug'] == '404') continue;
    if ($info['slug'] == '/') continue; 
    if (isset($info['method']) and strtoupper($info['method']) !== 'GET') continue;

    $description = $info['announce'] ?? '';
    $title = $info['title'] ?? '';
    $itemImage = '';
    
    if (!$description) $description = $info['description'] ?? '';
    
    if ($description) $description = '<div>' . $description . '</div>';
    
    $description = $description . LF . '<p><a href="' . $info['page-url'] . '">' . $title . ' →</a></p>';
    
    if ($fieldImage and !empty($info[$fieldImage])) {
        if ($info[$fieldImage] != UPLOADS_URL . 'default.webp') {
            $description .= '<p><img src="' . $info[$fieldImage] . '" width="400" alt=""></p>';
            $itemImage = $info[$fieldImage];
        }
    }

    $out .= '<item>' . LF;
    $out .= '<title>' . htmlspecialchars($title) . '</title>' . LF;
    $out .= '<link>' . $info['page-url'] . '</link>' . LF;
    $out .= '<description>' . htmlspecialchars($description) . '</description>' . LF;
        
    if (!empty($info['date']))
        $out .= '<pubDate>' . date('r', strtotime($info['date']))  . '</pubDate>' . LF;
    
    $out .= '</item>' . LF;
}

$out .= '</channel></rss>';

@header('Content-Type: application/xml; charset=utf-8');

echo $out;

# end of file
