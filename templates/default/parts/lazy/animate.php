<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// Анимация CSS: https://animate.style/
// use.animate: +

// <button class="button" onmouseover ="this.animate('animate__swing')">Hover Me</button>
// <button class="button" onclick ="this.animate('animate__tada')">Click Me</button>

if (checkStr(getPageData('use.animate', false)) === true) {
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">';

    echo '<script>HTMLElement.prototype.animate = function (animation) { let _self = this; animation = " animate__animated " + animation; _self.className += animation; _self.addEventListener("animationend", function () { _self.className = _self.className.replace(animation, ""); });}</script>';
}

# end of file
