<?php

/**
 * (c) Albireo CMS, https://maxsite.org/albireo, 2020-2026
 */

define('BASE_DIR', str_replace('\\', '/', dirname(realpath(__FILE__))) . '/');

if (file_exists(BASE_DIR . 'constants.php')) require BASE_DIR . 'constants.php';
if (!defined('LEVEL_UP_DIR')) define('LEVEL_UP_DIR', dirname(BASE_DIR) . '/');
if (!defined('SYS_DIR')) define('SYS_DIR', LEVEL_UP_DIR . 'system/');

require SYS_DIR . 'loader.php';

# end of file
