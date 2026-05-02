<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$logo = getPageData('headers.logo', '');
$logoSizeW = getPageData('headers.logo.width', 120);
$logoSizeH = getPageData('headers.logo.height', 120);
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
// $fields = getVal('layout.fields', false);
$fields = getVal('layout.fields', false);

$class1 = $fields ? 'body-bg' : 'b-shadow dark:b-shadow6 bg-primary650 dark:bg-primary850';

?>
<div class="layout-center-wrap <?= $class1 ?>"><div class="layout-wrap pad20-t pad10-b flex flex-wrap-tablet flex-vcenter b-shadow-field bg-primary650 dark:bg-primary850" style="background-image: url(<?= UPLOADS_URL ?>header/shine_046.webp); background-position: top center; background-repeat: no-repeat;">
        <div class="flex-grow5 flex flex-jc-center flex-vcenter t-center-tablet flex-wrap-tablet">
        <div class="flex-grow0"><?php if ($logo) : ?><img class="pad25-r pad0-tablet" src="<?= $logo ?>" width="<?= $logoSizeW ?>" height="<?= $logoSizeH ?>" alt=""><?php endif ?></div>
        <div class="flex-grow5 pad10-t-tablet">
            <div class="t250 t200-tablet t-primary100 dark:t-primary400 lh100 t-gabriela t-bold t-small-caps links-no-color pad5-b"><a class="hover-no-underline hover-t-primary200 dark:hover-t-primary500" href="<?= SITE_URL?>"><?= $title ?></a></div>
            <?php if ($subtitle) : ?><div class="t-primary200"><?= $subtitle ?></div><?php endif ?>
        </div>
    </div>
    <?php if ($menu) : ?>
    <div class="flex-grow0 w100-tablet lh100"><nav class="t-center-tablet t90"><?= menu1() ?></nav></div>
    <?php endif ?>
</div></div>
