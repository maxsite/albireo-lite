<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$logo = getPageData('headers.logo', '');
$logoSizeW = getPageData('headers.logo.width', 120);
$logoSizeH = getPageData('headers.logo.height', 120);
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);

$class1 = $fields ? '' : 'bg-primary800 ';

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
<div class="layout-center-wrap"><div class="layout-wrap pad30-t pad20-b bg-white dark:bg-primary700 b-shadow-field">
    <div class="flex flex-jc-center flex-vcenter t-center-tablet flex-wrap-tablet">
        <div class="flex-grow0"><?php if ($logo) : ?><img class="pad25-r pad10-tablet" src="<?= $logo ?>" width="<?= $logoSizeW ?>" height="<?= $logoSizeH ?>" alt=""><?php endif ?></div>
        <div class="flex-grow5 pad10-t-tablet">
            <div class="t300 t200-tablet t-primary700 dark:t-primary300 lh100 t-georgia t-small-caps links-no-color pad5-b"><a class="hover-no-underline hover-t-primary600 dark:hover-t-primary500" href="<?= SITE_URL?>"><?= $title ?></a></div>
            <?php if ($subtitle) : ?><div class="t-primary500 pad5-t"><?= $subtitle ?></div><?php endif ?>
        </div>
    </div>
</div></div>

<?php if ($menu) : ?>
<div id="<?= basename(__FILE__, '.php') ?>-menu" class="z-index99 layout-center-wrap lh100 <?= $class1 ?>"><nav class="bg-primary800 layout-wrap t-center-tablet b-shadow-field"><?= menu1() ?></nav></div>
<?php endif ?>
