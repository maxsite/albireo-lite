<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// демо пример для вывода раздельных рубрик
// для использования нужно поменять адреса и названия рубрик

// на главной выводим записи из указанных рубрик
// а на странице пагинации — всё как обычно


// !!! это старый вариант работы с рубриками !!!

if (PAGINATION < 2) {
    $result = getPages(
        limit: 2, 
        where: 'draft = 0 AND type = :type AND category LIKE :category',
        bindValue: [':type' => 'blog', ':category' => '%#astronomy#%']);
        
    $files1 = $result['files'];

    $result = getPages(
        limit: 4, 
        where: 'draft = 0 AND type = :type AND category LIKE :category',
        bindValue: [':type' => 'blog', ':category' => '%#dinosauria#%']);
        
    $files2 = $result['files'];

    $result = getPages(
        limit: 4, 
        where: 'draft = 0 AND type = :type AND category LIKE :category',
        bindValue: [':type' => 'blog', ':category' => '%#buddhism#%']);
        
    $files3 = $result['files'];
    
    echo tpl(data: $files1, tpl: TPL_DIR . 'columns-3.php', add: ['columnClass' => 'w48', 'header' => 'Астрономия', 'description' => '']);
    
    echo tpl(data: $files2, tpl: TPL_DIR . 'columns-2.php', add: ['columnClass' => 'w48', 'header' => 'Динозавры', 'description' => '']);
    
    echo tpl(data: $files3, tpl: TPL_DIR . 'one-column-4.php', add: ['columnClass' => 'w48', 'header' => 'Буддизм', 'description' => '']);

    echo '<div class="mar30-tb"><a class="icon-arrow-right" href="' . SITE_URL . '?page=2">Все записи</a></div>';
    
} else {
    $result = getPages(limit: getConfig('homeLimitPagination2', 10));
    $files = $result['files'];
    
    echo tpl(data: $files, tpl: TPL_DIR . 'one-column-3.php', add: ['columnClass' => 'w48', 'header' => '', 'description' => '']);
    
    echo tpl(data: $result['pagination'], tpl: TPL_DIR . 'pagination1.php');
}

# end of file
