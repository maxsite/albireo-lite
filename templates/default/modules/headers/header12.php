<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// для главной выводим большой блок, а для остальных страниц уменьшенный

$title = getPageData('headers.title', '');
$subtitle = getPageData('headers.subtitle', '');
$menu = checkStr(getPageData('menu', true)) === true;

// режим отображения зависит от поля header12.full
// еслм его нет, то смотрим главную страницу — на ней full
$mode = checkStr(getPageData('header12.full', null)); // null or true or false
$full = is_null($mode) ? (CURRENT_URL['url'] === '') : $mode;

// $images = ['default.webp', 'default1.webp', 'default2.webp', 'default3.webp'];
$images = ['header/abstract2.webp'];
$image = UPLOADS_URL . $images[array_rand($images)];

// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);

$class1 = $fields ? 'body-bg' : 'gr-linear-top dark:gr-linear-top';
$class2 = $fields ? 'body-bg' : 'bg-primary750 dark:bg-primary800';
$class3 = $fields ? 'gr-linear-top dark:gr-linear-top' : '';

$gradient = '--gr-start: var(--primary700); --gr-end: var(--primary600); --gr-start-dark: var(--primary850); --gr-end-dark: var(--primary700);';

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
<?php if ($menu) : ?>
<div id="<?= basename(__FILE__, '.php') ?>-menu" class="-pos-fixed -pos-sticky-tablet z-index9 layout-center-wrap lh100 t90 <?= $class2 ?>"><div class="layout-wrap t-center-tablet b-shadow-field bg-primary750 dark:bg-primary800"><nav class=""><?= menu1() ?></nav></div></div>
<?php endif ?>

<?php if ($full) : ?>
<div class="layout-center-wrap -pad30-t pad0-t-tablet <?= $class1 ?>" style="<?= $gradient ?>"><div class="layout-wrap pad20-t pad10-b b-shadow-field <?= $class3 ?>">
    <div class="flex flex-jc-center flex-vcenter t-center-tablet flex-wrap-tablet pad20-tb">
        <div class="flex-grow5 w100-tablet pad10-t-tablet">
            <div class="t300 t180-tablet t-primary50 lh100 t-georgia t-small-caps t-shadow links-no-color pad5-b t-tracking25"><a class="hover-no-underline hover-t-primary150" href="<?= SITE_URL?>"><?= $title ?></a></div>
            <?php if ($subtitle) : ?><div class="t-primary200 t120 pad10-tb"><?= $subtitle ?></div><?php endif ?>
            <ul class="t-primary200 list-unstyled mar10-t">
                <li class="bi-check mar5-b">Быстрая Flat-file CMS с низким ресурсопотреблением</li>
                <li class="bi-check mar5-b">Работает на любом хостинге с PHP 8</li>
                <li class="bi-check mar5-b">SEO-friendly — идеальна для поискового продвижения</li>
                <li class="bi-check mar5-b">Готовые модули, виджеты</li>
                <li class="bi-check mar5-b">Компактность. Отсутствие зависимостей. Чистый PHP</li>
            </ul>
            
            <div class="t-primary50 mar30-t">
                <a class="button bi-stars pad10-tb" href="https://maxsite.org/albireo">Получить Albireo CMS</a>
            </div>
        </div>

        <div class="flex-grow1 w100-tablet t-right t-center-tablet mar20-t-tablet">
            <img class="bor-primary600 bor2 bor-solid pad3 rounded10" src="<?= $image ?>" width="480" alt="">
        </div>
    </div>
</div></div>
<?php else: ?>
<div class="layout-center-wrap -pad30-t pad0-t-tablet <?= $class1 ?>" style="<?= $gradient ?>"><div class="layout-wrap pad20-t b-shadow-field <?= $class3 ?>">
    <div class="flex flex-jc-center flex-vcenter t-center-tablet flex-wrap-tablet pad20-tb">
        <div class="flex-grow5 w100-tablet pad10-t-tablet -t-center">
            <div class="t300 t180-tablet t-primary50 lh100 t-georgia t-small-caps t-shadow links-no-color pad5-b t-tracking25"><a class="hover-no-underline hover-t-primary150" href="<?= SITE_URL?>"><?= $title ?></a></div>
            <?php if ($subtitle) : ?><div class="t-primary200 t110 pad10-tb"><?= $subtitle ?></div><?php endif ?>
        </div>
    </div>
</div></div>
<?php endif ?>
