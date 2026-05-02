<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// ↥ ↑ ⇑ ⇡ ⇧ ⇪ ∧ ▲ △
/*
use.scrolltotop: +

scrolltotop.class: hide-print hide-tablet pos-fixed pos20-r pos20-b bg-primary400 hover-bg-primary600 t-white hover-t-white cursor-pointer t20px t-bold icon-square rounded transition-var animated b-hide-imp
scrolltotop.in: animation-zoom
scrolltotop.out: animation-zoomout
scrolltotop.offset: 300
scrolltotop.icon: ▲

*/
if (checkStr(getPageData('use.scrolltotop', false)) === true) : 
    $class = getPageData('scrolltotop.class', 'hide-print hide-tablet pos-fixed pos20-r pos20-b bg-primary400 hover-bg-primary600 t-white hover-t-white cursor-pointer t20px t-bold icon-square rounded transition-var animated b-hide-imp');
    $classIN = getPageData('scrolltotop.in', 'animation-zoom');
    $classOUT = getPageData('scrolltotop.out', 'animation-zoomout');
    $offset = getPageData('scrolltotop.offset', 300);
    $icon = getPageData('scrolltotop.icon', '▲');
?>
<script>
function scrollToTop(offset) { let toTop = document.createElement('div'); let effIn = '<?= $classIN ?>'; let effOut = '<?= $classOUT ?>'; toTop.className = '<?= $class ?>'; toTop.innerHTML = '<?= $icon ?>';  document.body.append(toTop);  if (window.pageYOffset > offset) { toTop.classList.remove(effOut); toTop.classList.remove('b-hide-imp'); toTop.classList.add(effIn); }  window.onscroll = function () { if (window.pageYOffset > offset) { toTop.classList.remove(effOut); toTop.classList.remove('b-hide-imp'); toTop.classList.add(effIn); } else { toTop.classList.remove(effIn); toTop.classList.add(effOut); } };  toTop.onclick = function (event) { window.scrollTo({ top: 0, behavior: "smooth" }); }; } window.onload = function () {scrollToTop(<?= $offset ?>);}
</script>
<?php endif ?>