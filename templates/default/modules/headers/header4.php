<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

$subtitle = getPageData('headers.subtitle', '');
$nameSite = getPageData('headers.namesite', '');
$subtitle2 = getPageData('headers.subtitle2', '');
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);

$class1 = $fields ? 'body-bg' : 'bg-primary800';
$class2 = $fields ? 'pad20-rl' : 'pad30-rl';

?>
<div class="layout-center-wrap <?= $class1 ?>">
    <div class="layout-wrap bg-primary800 dark:bg-primary700 b-shadow-field">
        <div class="flex flex-vcenter pad5-tb">
            <div class="flex-grow5 flex-shrink2 t-primary50 t-small-caps t110"><?= $subtitle ?></div>
            <div class="flex-grow1 pad10-l t-right t-primary100 t90"><?= $subtitle2 ?></div>
        </div>
    </div>
</div>

<div class="layout-center-wrap pos-sticky pos-sticky-tablet-none pos0-t z-index9 <?= $class1 ?>">
    <div class="layout-wrap pad0 bg-primary900 dark:bg-primary800 b-shadow-field">
        <div class="flex flex-wrap-tablet flex-vcenter">
            <div class="w30 w100-tablet flex-order2-tablet t-center-tablet">
                <div class="pad10-tb t-palatino t-tracking150 <?= $class2 ?>"><a class="t180 t-primary50 hover-t-primary200 hover-no-underline" href="<?= SITE_URL?>"><?= $nameSite ?></a></div>
            </div>
            
            <?php if ($menu) : ?>
            <nav class="flex-grow3 w100-tablet flex-order1-tablet pad20-rl t90 t-center-tablet lh100"><?= menu1() ?></nav>
            <?php endif ?>
        </div>
    </div>
</div>
