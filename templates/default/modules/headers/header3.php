<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);

$class1 = $fields ? 'body-bg' : 'bg-primary700';
$class2 = $fields ? 'body-bg' : 'bg-primary800';

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
<div class="layout-center-wrap <?= $class1 ?>"><div class="layout-wrap pad20-t pad10-b bg-primary700 b-shadow-field">
    <div class="flex flex-jc-center flex-vcenter t-center-tablet flex-wrap-tablet">
        <div class="flex-grow5 pad10-t-tablet">
            <div class="t220 t180-tablet t-gray50 lh100 t-georgia t-small-caps t-shadow links-no-color pad5-b t-tracking25"><a class="hover-no-underline hover-t-gray150" href="<?= SITE_URL?>"><?= $title ?></a></div>
            <?php if ($subtitle) : ?><div class="t-gray300 pad5-t"><?= $subtitle ?></div><?php endif ?>
        </div>
    </div>
</div></div>
<?php if ($menu) : ?>
<div id="<?= basename(__FILE__, '.php') ?>-menu" class="z-index99 layout-center-wrap lh100 <?= $class2 ?>"><nav class="layout-wrap t-center-tablet bg-primary800 b-shadow-field"><?= menu1() ?></nav></div>
<?php endif ?>
