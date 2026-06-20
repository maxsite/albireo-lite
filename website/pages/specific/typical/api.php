<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: @api/v1
slug: api
slug-pattern: api/(.*?)
method: ALL
layout: empty.php
head-meta[robots]: noindex
compress: -
parser: -

**/

if (class_exists('\Api\Api')) {
    // PHP 8.5 -> 8.3
    (new \Api\Api())->run();
} else {
    header('HTTP/1.0 404 Not Found');
    exit('API not found');
}

# end of file
