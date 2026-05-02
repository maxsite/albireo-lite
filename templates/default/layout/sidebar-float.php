<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// вывод шаблона с сайдбаром
// layout: sidebar-float.php

if (noUserAccessFull()) return;

require __DIR__ . '/_start.php';
templateModules('headers'); // шапки

?>
<div class="layout-center-wrap"><div class="layout-wrap container-content flex-tablet flex-column">
    <aside class="container-sidebar w30 b-right b-float-none-tablet w100-tablet mar30-l mar20-tb mar0-l-tablet flex-order2"><?=
        implodeWrap(
            data: widgets(),
            before: getConfig('widget-before'),
            after: getConfig('widget-after')
            ) ?></aside>
    <div class="flex-order1"><?php require __DIR__ . '/_content.php'; ?></div>
</div></div>
<?php

templateModules('footers'); // подвалы
require __DIR__ . '/_end.php';

# end of file

