<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// https://github.com/ganlanyuan/tiny-slider

/*
...
use.tiny-slider: +
...

<div style="--nav-bg-active: #4D4D4D; --nav-bg: #B8B8B8; --nav-bor-radius: 5px; --nav-mar: 0 3px; --nav-height: 10px; --nav-width: 20px">
    <div class="my-slider">
      <div class="pad30 bg-gray100">100</div>
      <div class="pad30 bg-gray200">200</div>
      <div class="pad30 bg-gray300">300</div>
      <div class="pad30 bg-gray400">400</div>
      <div class="pad30 bg-gray500">500</div>
    </div>
</div>

<!-- nosimple -->
<script>
    var slider = tns({
        container: '.my-slider',
        items: 2,
        autoplay: true,
        autoplayTimeout: 3000,
        mouseDrag: true,
        controls: false,
        navPosition: 'bottom',
        autoplayButtonOutput: false,
    });
</script>
<!-- /nosimple -->

*/

if (checkStr(getPageData('use.tiny-slider', false)) === true) {
    echo '<script src="' . RESOURCES_URL . 'tiny-slider/tiny-slider.js"></script>';
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'tiny-slider/tiny-slider.css">';
}

# end of file
