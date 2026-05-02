<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// layout: full-width.php

if (noUserAccessFull()) return;

require __DIR__ . '/_start.php';
templateModules('headers'); // шапки
require __DIR__ . '/_content.php';
templateModules('footers'); // подвалы
require __DIR__ . '/_end.php';

# end of file
