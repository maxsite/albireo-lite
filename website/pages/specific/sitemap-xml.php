<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

layout: empty.php
slug: sitemap.xml
title: sitemap.xml
type: system
compress: -
parser: -

**/

# https://you-site/sitemap.xml

/**
  * для изменения можно использовать параметры страницы:
  * sitemap-changefreq: monthly
  * sitemap-priority: 0.9
  *
  * исключить страницу из sitemap.xml
  * sitemap: -
  *
**/
$changefreqDef = 'monthly';
$priorityDef = '0.5';

// $pagesInfo = getVal('pagesInfo');

// большой лимит, чтобы получить все записи
$pages = getPages(limit: 20000, where: 'draft = 0 AND type != "system" AND sitemap = 1'); 


$out = '';

// главная страница отдельно
$out .= '<url>' . "\n";
$out .= '<loc>' . SITE_URL . '</loc>' . "\n";
$out .= '<changefreq>daily</changefreq>' . "\n"; // always hourly daily weekly monthly yearly never
$out .= '<priority>0.9</priority>' . "\n";
$out .= '</url>' . "\n";
    
foreach($pages['files'] as $file => $info) {

    $slug = $info['slug'];

    if ($slug == '404') continue; // исключить 404
    if ($slug == '/') continue; // home уже добавлен в начале файла
    if (isset($info['method']) and strtoupper($info['method']) !== 'GET') continue;

    // пропускаем те, где отмечено sitemap: - и type: system
    // if (checkArrVal($info, 'sitemap', true) !== true) continue;
    // if (!empty($info['type']) and $info['type'] === 'system') continue;

    $changefreq = $info['sitemap-changefreq'] ?? $changefreqDef;
    $priority = $info['sitemap-priority'] ?? $priorityDef;

    if ($slug == '/') $slug = ''; // главная

    // у страницы может быть несколько языковых версий
    $hlangs = '';

    if (!empty($info['_keys']['head-lang'])) {
        foreach ($info['_keys']['head-lang'] as $langKey => $langUrl) {
            $hlangs .= '<xhtml:link rel="alternate" hreflang="' . $langKey . '" href="' . $langUrl . '" />' . "\n";
        }
    }

    $out .= '<url>' . "\n";
    $out .= '<loc>' . rtrim(SITE_URL . $slug, '/') . '</loc>' . "\n";
    $out .= $hlangs;
    $out .= '<lastmod>' . date('Y-m-d', filemtime($file)) . '</lastmod>' . "\n";
    $out .= '<changefreq>' . $changefreq . '</changefreq>' . "\n";
    $out .= '<priority>' . $priority . '</priority>' . "\n";
    $out .= '</url>' . "\n";
}

header('Content-Type: application/xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';
echo $out;
echo '</urlset>';

/*
// https://www.sitemaps.org/ru/protocol.html
// https://developers.google.com/search/docs/specialty/international/localized-versions?hl=ru#sitemap

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc>http://www.example.com/</loc>
      <lastmod>2005-01-01</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
      <xhtml:link rel="alternate" hreflang="de" href="https://www.example.de/deutsch/page.html"/>
   </url>
</urlset>

*/