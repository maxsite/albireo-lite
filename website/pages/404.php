<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: 404 - ничего не найдено
slug: 404
head-meta[robots]: noindex
sitemap: -
other-pages: -
stat: -
comments: -

**/

header('HTTP/1.0 404 Not Found');
echo extras('not-found.php');

# end of file
