<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$logo = getPageData('headers.logo', '');
$logoSizeW = getPageData('headers.logo.width', 120);
$logoSizeH = getPageData('headers.logo.height', 120);
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
// $fields = getVal('layout.fields', false);

$class1 = 'bor1 bor-solid-t bor-solid-b bor-primary400';

if (checkStr(getPageData('headers.pursuing', false)) === true) {
    echo strRemoveLF("<script>
      document.addEventListener('DOMContentLoaded', function () {
        pursuingNav('#" . basename(__FILE__, '.php') . "-menu', {
            myclass: '" . getPageData('headers.pursuing.class', '') . "',
            threshold: " . getPageData('headers.pursuing.threshold', 0) . "
        });
      });
    </script>");
}

?>
<div class="layout-center-wrap"><div class="layout-wrap pad30-t body-bg b-shadow-field">
    <div class="flex flex-jc-center flex-vcenter t-center-tablet flex-wrap-tablet mar20-b">
        <div class="flex-grow0"><?php if ($logo) : ?><img class="pad25-r pad10-tablet" src="<?= $logo ?>" width="<?= $logoSizeW ?>" height="<?= $logoSizeH ?>" alt=""><?php endif ?></div>
        <div class="flex-grow5 pad10-t-tablet">
            <div class="t300 t250-tablet t-primary700 dark:t-primary500 lh100 t-gabriela t-bold t-small-caps links-no-color pad5-b"><a class="hover-no-underline hover-t-primary600 dark:hover-t-primary500" href="<?= SITE_URL?>"><?= $title ?></a></div>
            <?php if ($subtitle) : ?><div class="t-primary550 pad5-t"><?= $subtitle ?></div><?php endif ?>
        </div>
    </div>
    <?php if ($menu) : ?>
    <div id="<?= basename(__FILE__, '.php') ?>-menu" class="z-index99 lh100 <?= $class1 ?>"><nav class="t-center-tablet"><?= menu1() ?></nav></div>
    <?php endif ?>
</div></div>

