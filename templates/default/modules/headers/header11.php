<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// этот модуль — каркас для дальнейшей модификации

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$bg = UPLOADS_URL . 'header/shine_039.png';
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);

if ($fields) :
?>
<div class="layout-center-wrap"><div class="layout-wrap t-primary100 bg-primary800 h100px-min bg-size-cover b-shadow-field" style="background-image: url('<?= $bg ?>');">
<?php else : ?>
<div class="layout-center-wrap t-primary100 bg-primary800 bor4 bor-solid-b bor-primary400 bg-size-cover" style="background-image: url('<?= $bg ?>');"><div class="layout-wrap h100px-min">
<?php endif ?>
<?php if ($menu) : ?>
<nav class="t90"><?= menu1() ?></nav>
<?php endif ?>
<div><?= $title ?><?= $subtitle ?></div>
</div>
<div class="layout-wrap bg-primary400 b-shadow-field -pad3-t"></div>
</div>
