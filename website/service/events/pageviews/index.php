<?php 

// имя совпадает с текущим каталогом
namespace events\pageviews;

function init() {
    if (getPageData('type') == 'system') return;
    if (getVal('is404', false)) return;
    if (getUser(true)) return;
    
    $stat = \Services\Services::getInstance()->get(\PageViews\PageViews::class);
    if ($stat !== null) $stat->save();
}

# end of file
