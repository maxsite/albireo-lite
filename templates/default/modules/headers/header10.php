<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$menu = checkStr(getPageData('menu', true)) === true;

// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);

# shine_025 shine_043 shine_039
$bgIMG = 'style="background-image: url(' . UPLOADS_URL . 'header/shine_039.png' .');"';

$class1 = $fields ? '' : 'bg-primary400';

?>
<div class="layout-center-wrap <?= $class1 ?>"><div class="layout-wrap pad35-t pad10-b b-shadow-field t-center bg-no-repeat bg-position-top bg-primary400 dark:bg-primary700" <?= $bgIMG ?>>
    <div class="animation-bounce t350 t220-tablet t-shadow lh100 t-gabriela links-no-color pad15-b t-bold" style="--shadow-t: 0 0 5px rgba(255, 255, 255, 0.9);"><a class="hover-no-underline t-primary750 dark:t-primary100 hover-t-primary750 dark:hover-t-primary200" href="<?= SITE_URL?>"><?= $title ?></a></div>
    
    <?php if ($subtitle) : ?><div class="t-primary700 dark:t-primary500 pad10-b"><?= $subtitle ?></div><?php endif ?>
    <?php if ($menu) : ?>
    <div class="lh100 t-center"><nav class=""><?= menu1() ?></nav></div>
    <?php endif ?>
</div></div>
