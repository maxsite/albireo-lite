<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*

# просто подключение js-файла, если нужно кастомное подключение
use.pursuingnav: +

# подключение для заголовков (код указывается в файлах шапки)
headers.pursuing: +
headers.pursuing.class: animation-top animation-fast
headers.pursuing.threshold: 100

<script>
  document.addEventListener('DOMContentLoaded', function () {
    pursuingNav('#header2-menu', {
      myclass: 'animation-top animation-fast',
      threshold: 100
    });
  });
</script>

*/

if (checkStr(getPageData('use.pursuingnav', false)) === true or checkStr(getPageData('headers.pursuing', false)) === true) 
    echo '<script src="' . RESOURCES_URL . 'pursuingnavjs/pursuingnav.js"></script>';

# end of file