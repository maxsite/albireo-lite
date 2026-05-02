<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// layout: doc1.php
// см. config/doc1.php

if (noUserAccessFull()) return;

$_configFile = getPageData('doc.config', 'doc1.php');
$_options = getConfigFile(CONFIG_DIR . $_configFile);

if (!$_options)
    exit('Not doc config...');

require __DIR__ . '/_start.php';
templateModules('headers'); // шапки

?>
<section id="docNav" class="h100vh overflow-auto w300px pos-fixed pos0-t overscroll-behavior-contain z-index99 hide-tablet w100-tablet <?= $_options['nav'] ?>" style="<?= $_options['nav-style'] ?>">
    <div class="b-hide show-tablet animation-fade pos-sticky pos0-t z-index9">
        <button class="<?= $_options['buttonTablet'] ?>" onclick="document.getElementById('docNav').classList.toggle('hide-tablet');"><?= $_options['buttonCloseText'] ?></button>
    </div>

    <div class="flex flex-column h100">
        <?= $_options['top'] ?>
        <nav class="flex-grow5"><?= menuDoc(getPageData('doc.config', 'doc1.php')); ?></nav>
        <?= $_options['footer'] ?>
    </div>
</section>

<section class="w100-tablet mar0-tablet" style="margin-left: 300px;">
    <div class="b-hide show-tablet pos-sticky pos0-t">
        <button class="<?= $_options['buttonTablet'] ?>" onclick="document.getElementById('docNav').classList.toggle('hide-tablet');"><?= $_options['buttonOpenText'] ?></button>
    </div>

    <section class="<?= $_options['article'] ?>"><?php require __DIR__ . '/_content.php' ?></section>
</section>
<!-- nosimple -->
<style>
html {scroll-behavior: smooth;}

#docNav {
    scrollbar-width: thin; 
    scrollbar-color: <?= $_options['scrollbar-thumb'] ?> <?= $_options['scrollbar'] ?>;
}

#docNav::-webkit-scrollbar {
    width: 14px;
    height: 14px;
    background-color: <?= $_options['scrollbar'] ?>;
}

#docNav::-webkit-scrollbar-thumb {
    background-color: <?= $_options['scrollbar-thumb'] ?>;
    border-radius: 14px;
}

#docNav::-webkit-scrollbar-thumb:hover {
    background-color: <?= $_options['scrollbar-thumb-hover'] ?>;
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("docNav");
  const activeItem = sidebar.querySelector(".linkActive");
  if (activeItem) {
    activeItem.scrollIntoView({
      behavior: "smooth", // "smooth", "auto"
      block: "center",    // "nearest", "start", "end"
    });
  }
});
</script>
<!-- /nosimple -->

<?php
    templateModules('footers'); // подвалы
    require __DIR__ . '/_end.php';

# end of file
