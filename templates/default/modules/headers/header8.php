<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$logo = getPageData('headers.logo', '');
$logoSizeW = getPageData('headers.logo.width', 120);
$logoSizeH = getPageData('headers.logo.height', 120);
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);

$class1 = $fields ? 'body-bg' : 'gr-linear-top dark:gr-linear-top';

$gr = '--gr-start: var(--white); --gr-end: var(--primary400); --gr-start-dark: var(--primary900); --gr-end-dark: var(--primary700);';

?>
<div class="layout-center-wrap <?= $class1 ?>" style="<?= $gr ?>"><div class="layout-wrap pad30-t pad20-b flex flex-wrap-tablet flex-vcenter gr-linear-top dark:gr-linear-top b-shadow-field" style="<?= $gr ?>">
    
    <div class="flex-grow5 flex flex-jc-center flex-vcenter t-center-tablet flex-wrap-tablet">
        <div class="flex-grow0"><?php if ($logo) : ?><img class="pad25-r pad0-tablet" src="<?= $logo ?>" width="<?= $logoSizeW ?>" height="<?= $logoSizeH ?>" alt=""><?php endif ?></div>
        <div class="flex-grow5 pad10-t-tablet">
            <div class="t250 t200-tablet t-primary600 dark:t-primary400 lh100 t-georgia t-small-caps links-no-color pad5-b"><a class="hover-no-underline hover-t-primary700 dark:hover-t-primary500" href="<?= SITE_URL?>"><?= $title ?></a></div>
            <?php if ($subtitle) : ?><div class="t-primary500 pad5-t"><?= $subtitle ?></div><?php endif ?>
        </div>
    </div>
    <?php if ($menu) : ?>
    <div class="flex-grow0 lh100"><nav class="t-center-tablet t90"><?= menu1() ?></nav></div>
    <?php endif ?>
</div></div>

