<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// rss: +
// rss.comments: +

if (checkStr(getPageData('rss', true)) === true) {
    if (getConfig('rssLimit', 0) > 0)
        echo '<link rel="alternate" type="application/rss+xml" title="' . lang('Site news') . '" href="' . SITE_URL . 'rss.xml">';
}

if (checkStr(getPageData('rss.comments', true)) === true) {
    if (getConfig('rssLimitComments', 0) > 0)
        echo '<link rel="alternate" type="application/rss+xml" title="' . lang('Latest comments') . '" href="' . SITE_URL . 'rss-comments.xml">';
}

# end of file
