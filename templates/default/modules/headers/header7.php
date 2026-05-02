<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$logo = getPageData('headers.logo', '');
$logoSizeW = getPageData('headers.logo.width', 120);
$logoSizeH = getPageData('headers.logo.height', 120);
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);

$class1 = $fields ? 'body-bg' : '';
$class2 = $fields ? 'body-bg' : 'bg-primary700';

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
<div class="layout-center-wrap <?= $class1 ?>"><div class="layout-wrap pad20-t pad10-b t-center bg-white dark:bg-primary800 b-shadow-field">
    <?php if ($logo) : ?><img class="mar20-b" src="<?= $logo ?>" width="<?= $logoSizeW ?>" height="<?= $logoSizeH ?>" alt=""><?php endif ?>

    <div class="t350 t200-tablet t-gray50 lh100 t-georgia t-italic links-no-color pad20-b t-tracking25 t-bold"><a class="hover-no-underline t-primary700 dark:t-primary300 hover-t-primary650 dark:hover-t-primary500" href="<?= SITE_URL?>"><?= $title ?></a></div>
    
    <?php if ($subtitle) : ?><div class="t-primary500 pad10-b"><?= $subtitle ?></div><?php endif ?>
</div></div>
<?php if ($menu) : ?>
<div id="<?= basename(__FILE__, '.php') ?>-menu" class="z-index99 layout-center-wrap lh100 <?= $class2 ?>"><nav class="layout-wrap t-center bg-primary700 dark:bg-primary850 b-shadow-field"><?= menu1() ?></nav></div>
<?php endif ?>