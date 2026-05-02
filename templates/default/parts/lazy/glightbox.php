<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// https://github.com/biati-digital/glightbox
// use.glightbox: +

if (checkStr(getPageData('use.glightbox', false)) === true) : 

?>
<link rel="stylesheet" href="<?= RESOURCES_URL ?>glightbox/glightbox.min.css">
<script src="<?= RESOURCES_URL ?>glightbox/glightbox.min.js"></script>
<script>const lightbox = GLightbox({ touchNavigation: true, loop: false, autoplayVideos: false, closeOnOutsideClick: false, preload: false });</script>
<?php endif ?>