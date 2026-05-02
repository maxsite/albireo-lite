<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// вывод шаблона с сайдбаром
// layout: sidebar.php

if (noUserAccessFull()) return;

require __DIR__ . '/_start.php';
templateModules('headers'); // шапки
?>
<div class="layout-center-wrap"><div class="layout-wrap container-content">
    <div class="flex flex-wrap-tablet">
        <div class="w70 w100-tablet"><?php
            require __DIR__ . '/_content.php';
        ?></div>
        <aside class="w25 w100-tablet container-sidebar"><?=
            implodeWrap(
                data: widgets(),
                before: getConfig('widget-before'),
                after: getConfig('widget-after')
                ) ?></aside>
    </div>
</div></div>
<?php

templateModules('footers'); // подвалы
require __DIR__ . '/_end.php';

# end of file
