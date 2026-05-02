<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// вывод шаблона по умолчанию
// layout: default.php

if (noUserAccessFull()) return;

require __DIR__ . '/_start.php';
templateModules('headers'); // шапки

// этот контейнер ограничивает ширину контента
echo '<div class="layout-center container-content">';
    require __DIR__ . '/_content.php';
echo '</div>';

templateModules('footers'); // подвалы
require __DIR__ . '/_end.php';

# end of file
