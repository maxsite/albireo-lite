<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html<?= implode(getKeysPageData('html', ' [key]="[val]"', html: true)) ?>>
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars(getPageData('title')) ?></title>
<meta name="description" content="<?= htmlspecialchars(strRemoveLF(getPageData('description'))) ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="generator" content="Albireo CMS (https://maxsite.org/albireo)">
<?php
echo implode(getKeysPageData('head-meta', '<meta name="[key]" content="[val]">', html: true));
echo implode(getKeysPageData('http-equiv', '<meta http-equiv="[key]" content="[val]">', html: true));
echo implode(getKeysPageData('ogp', '<meta property="[key]" content="[val]">', html: true));
echo implode(getKeysPageData('head-lang', '<link rel="alternate" hreflang="[key]" href="[val]">', html: true));
echo implode(getKeysPageData('head-rel-href', '<link rel="[key]" href="[val]">', html: true));
echo implode(getKeysPageData('head', '[val]'));

if ($_content_files = findFilesFromDirs('[!_]*.php', TEMPLATE_PARTS_DIR . 'head', SERVICE_MY_DIR . 'parts/head')) {
    foreach($_content_files as $_file) requireSafe($_file);
    unset($_content_files, $_file);
}
?>
</head>
<body <?= getPageData('body') ?>><?php
    echo getPageData('layout-start', '');

# end of file