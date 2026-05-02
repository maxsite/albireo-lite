<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Примеры группировок записей
type: system
slug: group-samples
layout: default.php

**/

// общие записи для всех блоков
// $files = getPagesField('type', 'blog'); 
#$files = getPagesField('group', 'demo'); 
// $files = sortArray($files, 'date', 'date-desc'); 
#$files = sortArray($files, '', 'rand'); 

$files = getPages();
$files = $files['files'];

// вывод one-column-1.php
$files1 = array_slice($files, 0, 2, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'one-column-1.php', add: ['header' => 'one-column-1', 'description' => 'before, header, description']);

echo '<hr><hr>';


// вывод one-column-2.php
$files1 = array_slice($files, 0, 2, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'one-column-2.php', add: ['header' => 'one-column-2', 'description' => 'before, header, description']);

echo '<hr><hr>';


// вывод one-column-3.php
$files1 = array_slice($files, 0, 2, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'one-column-3.php', add: ['header' => 'one-column-3', 'description' => 'before, header, description']);

echo '<hr><hr>';


// вывод one-column-4.php
$files1 = array_slice($files, 0, 2, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'one-column-4.php', add: ['header' => 'one-column-4', 'description' => 'before, header, description']);

echo '<hr><hr>';


// вывод columns-1.php
$files1 = array_slice($files, 0, 3, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'columns-1.php', add: ['header' => 'columns-1', 'description' => 'before, header, description, columnClass = w31', 'columnClass' => 'w31']);

echo '<hr><hr>';


// вывод columns-2.php
$files1 = array_slice($files, 0, 3, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'columns-2.php', add: ['header' => 'columns-2', 'description' => 'before, header, description, columnClass = w31', 'columnClass' => 'w31']);

echo '<hr><hr>';


// вывод columns-3.php
$files1 = array_slice($files, 0, 3, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'columns-3.php', add: ['header' => 'columns-3', 'description' => 'before, header, description, columnClass = w31', 'columnClass' => 'w31']);

echo '<hr><hr>';


// вывод columns-4.php
$files1 = array_slice($files, 0, 6, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'columns-4.php', add: ['header' => 'columns-4', 'description' => 'before, header, description, columnClass = w31', 'columnClass' => 'w31']);

echo '<hr><hr>';


// вывод columns-4-1.php
$files1 = array_slice($files, 0, 6, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'columns-4-1.php', add: ['header' => 'columns-4-1', 'description' => 'before, header, description, columnClass = w31, wordCount = 25', 'columnClass' => 'w31', 'wordCount' => 25]);

echo '<hr><hr>';

// вывод columns-5.php
$files1 = array_slice($files, 0, 6, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'columns-5.php', add: ['header' => 'columns-5', 'description' => 'before, header, description, columnClass = w48, wordCount = 25', 'columnClass' => 'w48', 'wordCount' => 25]);

echo '<hr><hr>';

// вывод columns-6.php
$files1 = array_slice($files, 0, 6, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'columns-6.php', add: ['header' => 'columns-6', 'description' => 'before, header, description, columnClass = w31, wordCount = 25', 'columnClass' => 'w31', 'wordCount' => 25]);

echo '<hr><hr>';

// вывод columns-7.php
$files1 = array_slice($files, 0, 6, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'columns-7.php', add: ['header' => 'columns-7', 'description' => 'before, header, description']);

echo '<hr><hr>';


// вывод group-1.php
$files1 = array_slice($files, 0, 5, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'group-1.php', add: ['header' => 'group-1', 'description' => 'before, header, description']);

echo '<hr><hr>';


// вывод group-1-1.php
$files1 = array_slice($files, 0, 12, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'group-1-1.php', add: ['header' => 'group-1-1', 'description' => 'before, header, description']);

echo '<hr><hr>';


// вывод group-2.php
$files1 = array_slice($files, 0, 5, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'group-2.php', add: ['header' => 'group-2', 'description' => 'before, header, description, columnClass = w48, columnClass2 = w31, firstLine=2', 'columnClass' => 'w48', 'columnClass2' => 'w31', 'firstLine' => 2 ]);

echo '<hr><hr>';


// вывод group-2-1.php
$files1 = array_slice($files, 0, 5, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'group-2-1.php', add: ['header' => 'group-2-1', 'description' => 'before, header, description, columnClass = w48, columnClass2 = w31, firstLine=2', 'columnClass' => 'w48', 'columnClass2' => 'w31', 'firstLine' => 2 ]);

echo '<hr><hr>';


// вывод group-3.php
$files1 = array_slice($files, 0, 5, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'group-3.php', add: ['header' => 'group-3', 'description' => 'before, header, description, columnClass = w48, columnClass2 = w31, firstLine=2', 'columnClass' => 'w48', 'columnClass2' => 'w31', 'firstLine' => 2 ]);

echo '<hr><hr>';


// вывод group-4.php
$files1 = array_slice($files, 0, 8, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'group-4.php', add: ['header' => 'group-4', 'description' => 'before, header, description']);

echo '<hr><hr>';

/*
// вывод short.php — большой по содержанию
$files1 = array_slice($files, 0, 3, true);
echo tpl(data: $files1, tpl: TPL_DIR . 'short.php');

echo '<hr><hr>';
*/


