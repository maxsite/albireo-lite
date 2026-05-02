<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// Wow.js https://wowjs.uk/docs.html
// use.wow: +

/*
data-wow-duration: Change the animation duration
data-wow-delay: Delay before the animation starts
data-wow-offset: Distance to start the animation (related to the browser bottom)
data-wow-iteration: Number of times the animation is repeated

<section class="wow animate__backInRight" data-wow-duration="2s" data-wow-delay="5s"></section>
<section class="wow animate__backInLeft" data-wow-offset="10" data-wow-iteration="10"></section>

*/

if (checkStr(getPageData('use.wow', false)) === true) {
    echo strRemoveLF('<script src="' . RESOURCES_URL . 'wow/wow.min.js"></script>
<script>document.addEventListener("DOMContentLoaded", function () { wow = new WOW({boxClass: "wow", animateClass: "animate__animated", offset: 100});
wow.init();});</script>');
}

# end of file
