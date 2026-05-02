<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$logo = getPageData('headers.logo', '');
$logoSizeW = getPageData('headers.logo.width', 120);
$logoSizeH = getPageData('headers.logo.height', 120);
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
// $fields = getVal('layout.fields', false);
// $class1 = $fields ? 'body-bg' : 'gr-linear-top';

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
<div class="layout-center-wrap"><div class="layout-wrap bg-white dark:bg-primary800 pad35-t pad10-b t-center b-shadow-field">
    <?php if ($logo) : ?><img class="mar15-b animation-bounce" src="<?= $logo ?>" width="<?= $logoSizeW ?>" height="<?= $logoSizeH ?>" alt=""><?php endif ?>

    <div class="t350 t200-tablet t-primary700 dark:t-primary300 lh100 t-georgia links-no-color pad20-b t-bold"><a class="hover-no-underline hover-t-primary750 dark:hover-t-primary500" href="<?= SITE_URL?>"><?= $title ?></a></div>
    
    <?php if ($subtitle) : ?><div class="t-primary500 pad10-b"><?= $subtitle ?></div><?php endif ?>
</div></div>
<?php if ($menu) : ?>
<div id="<?= basename(__FILE__, '.php') ?>-menu" class="z-index99 layout-center-wrap lh100"><nav class="layout-wrap bg-primary600 dark:bg-primary700 t-center b-shadow-field"><?= menu1() ?></nav></div>
<?php endif ?>