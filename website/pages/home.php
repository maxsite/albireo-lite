<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: <?= getConfig('siteTitle') ?>
description: <?= getConfig('siteDescription') ?>
slug: /
pagination-format: [NBSP] - <?= lang('page') ?> %d

# не используем type: system, поскольку нужно включить stat: + (как он по умолчанию определён)
comments: -
other-pages: -

stat.page: -

**/

// файлы вывода главной располагаются в каталоге шаблона modules/home
// переопределить вывод главной можно через опцию homeOutputModule
module(getConfig('homeOutputModule', 'home/home1.php'));

# end of file
