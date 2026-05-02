<?php

/**
 * (c) Albireo CMS, https://maxsite.org/albireo, 2020-2025
 */

// каталог текущего сайта
define('BASE_DIR', dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR);

// свои начальные константы в constants.php
if (file_exists(BASE_DIR . 'constants.php')) require BASE_DIR . 'constants.php';

// каталог уровнем выше
if (!defined('LEVEL_UP_DIR')) define('LEVEL_UP_DIR', dirname(BASE_DIR) . DIRECTORY_SEPARATOR);

// системный каталог уровнем выше
if (!defined('SYS_DIR')) define('SYS_DIR', LEVEL_UP_DIR . 'system' . DIRECTORY_SEPARATOR);

// загрузка Albireo CMS
require_once SYS_DIR . 'loader.php';

# end of file
