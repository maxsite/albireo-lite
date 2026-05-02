<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); ?><!DOCTYPE HTML>
<html><head>
<meta charset="UTF-8">
<title>No User Access</title>
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="generator" content="Albireo CMS (https://maxsite.org/albireo)">
<link rel="stylesheet" href="<?= RESOURCES_URL ?>berry/berry.css?<?= ALBIREO_VERSION ?>">
</head><body>
<div class="layout-center">
    <div class="mar50-b mar30-t t-center">
        <div class="t200 t-bold t-primary700"><?= lang('Access denied!') ?></div>
        <div class="pad20 t-gray500"><a href="<?= SITE_URL ?>login"><?= lang('Login') ?></a>&nbsp; | &nbsp;<a href="<?= SITE_URL ?>"><?= lang('Home') ?> →</a></div>
    </div>
</div>
</body></html>