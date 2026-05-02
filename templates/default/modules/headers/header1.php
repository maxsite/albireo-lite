<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

$subtitle = getPageData('headers.subtitle', '');
$nameSite = getPageData('headers.namesite', '');
$subtitle2 = getPageData('headers.subtitle2', '');
$menu = checkStr(getPageData('menu', true)) === true;
    
// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);

// $title = getPageData('headers.title', '');
// $logo = getPageData('headers.logo', '');

?>
<div class="layout-center-wrap bg-primary900">
    <div class="layout-wrap">
        <div class="flex flex-wrap-tablet flex-vcenter pad10-tb lh130">
            <div class="flex-grow5 flex-shrink2 t-primary50 t-small-caps t110 w100-tablet t-center-tablet"><?= $subtitle ?></div>
            <div class="flex-grow1 w100-tablet t-primary50 t-right t-center-tablet"><?= $subtitle2 ?></div>
        </div>
    </div>
</div>

<div class="layout-center-wrap bg-primary900 pos-sticky pos-sticky-tablet-none pos0-t z-index9">
    <div class="layout-wrap pad0 bg-primary600 dark:bg-primary850">
        <div class="flex flex-wrap-tablet flex-vcenter">
            <div class="w30 w100-tablet flex-order2-tablet t-center-tablet">
                <div class="bg-primary700 dark:bg-primary800 pad30-rl pad10-tb t-palatino t-tracking150"><a class="t180 t-primary50 hover-t-primary200 hover-no-underline" href="<?= SITE_URL?>"><?= $nameSite ?></a></div>
            </div>
            <?php if ($menu) : ?>
            <nav class="flex-grow3 w100-tablet flex-order1-tablet pad20-rl t90 t-center-tablet lh100"><?= menu1() ?></nav>
            <?php endif ?>
        </div>
    </div>
</div>
