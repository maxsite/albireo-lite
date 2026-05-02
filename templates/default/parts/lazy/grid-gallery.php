<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// https://github.com/jestov/grid-gallery
// DEMO https://jestov.github.io/grid-gallery/
/*
...
use.grid-gallery: +
  или 
use.grid-gallery.nojs: +
use.glightbox: +
...

Класс b-hide нужен чтобы изображения «не прыгали» до полной загрузки галереи.

<div class="gg-container b-hide">
  <div class="gg-box">
    <img src="img/your-image-1.webp">
    <img src="img/your-image-2.webp">
    <img src="img/your-image-n.webp">
  </div>
</div>

--- or ---

<div class="gg-container">
  <div class="gg-box">
    ![](//gal/landscape/1@900.webp)
    ![](//gal/landscape/2@900.webp)
    ![](//gal/landscape/3@900.webp)
  </div>
</div>

--- with style options ---

<div class="gg-container b-hide" style="--backdrop-color: rgb(200 200 200 / 0.9); --gap-length: 5px;">

Default:
    --backdrop-color: rgba(20, 20, 20, 0.9);
    --gap-length: 2px;
    --row-height: 200px;
    --column-width: 220px;
    --main-color: #000;
    --secondary-color: #111;
    --txt-color: #fff;
    --img-bg-color: rgba(240, 240, 240, 0.9);
  
  <div class="gg-box" data-layout="square">
  <div class="gg-box" data-layout="horizontal">
  <div class="gg-box" data-theme="dark">
  
--- with style options ---


<!-- в таком варианте  работает только авторазмер изображений без massonry -->

use.grid-gallery.nojs: +
use.glightbox: +

<div class="gg-container">
    <div class="gg-box b-hide">
        <a class="glightbox" href="<?= UPLOADS_URL ?>gal/landscape/1@900.webp">![](//gal/landscape/1@900.webp)</a>
        <a class="glightbox" href="<?= UPLOADS_URL ?>gal/landscape/2@900.webp">![](//gal/landscape/2@900.webp)</a>
        <a class="glightbox" href="<?= UPLOADS_URL ?>gal/landscape/3@900.webp">![](//gal/landscape/3@900.webp)</a>
        <a class="glightbox" href="<?= UPLOADS_URL ?>gal/landscape/4@900.webp">![](//gal/landscape/4@900.webp)</a>
        <a class="glightbox" href="<?= UPLOADS_URL ?>gal/landscape/5@900.webp">![](//gal/landscape/5@900.webp)</a>
        <a class="glightbox" href="<?= UPLOADS_URL ?>gal/landscape/6@900.webp">![](//gal/landscape/6@900.webp)</a>
        <a class="glightbox" href="<?= UPLOADS_URL ?>gal/landscape/7@900.webp">![](//gal/landscape/7@900.webp)</a>
        <a class="glightbox" href="<?= UPLOADS_URL ?>gal/landscape/8@900.webp">![](//gal/landscape/8@900.webp)</a>
        <a class="glightbox" href="<?= UPLOADS_URL ?>gal/landscape/9@900.webp">![](//gal/landscape/9@900.webp)</a>
    </div>
</div>
  
*/

// можно использовать и без js-файла, если не требуется большой просмотр изображений,
// а также для комбинирования с glightbox
if (checkStr(getPageData('use.grid-gallery.nojs', false)) === true) {
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'grid-gallery/grid-gallery.css">';
} elseif (checkStr(getPageData('use.grid-gallery', false)) === true) {
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'grid-gallery/grid-gallery.css">';
    echo '<script src="' . RESOURCES_URL . 'grid-gallery/grid-gallery.min.js"></script>';
}

# end of file
