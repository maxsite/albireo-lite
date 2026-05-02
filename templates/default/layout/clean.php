<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// шаблон для записей, где не используются шапка и подвал
// layout: clean.php

if (noUserAccessFull()) return;

require __DIR__ . '/_start.php';

// этот контейнер ограничивает ширину контента
echo '<div class="layout-center">';
    require __DIR__ . '/_content.php';
echo '</div>';

require __DIR__ . '/_end.php';

# end of file
