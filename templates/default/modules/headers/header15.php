<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$menu = checkStr(getPageData('menu', true)) === true;

?>
<div class="layout-center-wrap">
    <div class="layout-wrap pad35-t pad10-b t-center bor1 bor-solid-b bor-primary400">
        <div class="t350 t200-tablet t-primary700 dark:t-primary300 lh120 t-georgia links-no-color pad20-b t-bold"><a class="hover-no-underline hover-t-primary750 dark:hover-t-primary500" href="<?= SITE_URL?>"><?= $title ?></a></div>
    
        <?php if ($subtitle) : ?><div class="t-primary500 pad10-b"><?= $subtitle ?></div><?php endif ?>
        <?php if ($menu) : ?><div class="lh100 mar10-tb"><nav><?= menu1() ?></nav></div><?php endif ?>
    </div>
</div>
