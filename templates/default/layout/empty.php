<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// вывод текста страницы как есть
// layout: empty.php

if (noUserAccessFull()) return;

require getVal('pageFile');

# end of file
