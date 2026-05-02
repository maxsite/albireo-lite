<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Logout
slug: logout
head-meta[robots]: noindex
description: 
parser: -
type: system
layout: empty.php

**/

// удалим данные из сессии
session_destroy();

// редирект назад только для своего сайта
$redirect = SITE_URL;

if (!empty($_SERVER['HTTP_REFERER'])) {
     if (str_starts_with($_SERVER['HTTP_REFERER'], SITE_URL) == true) 
         $redirect = $_SERVER['HTTP_REFERER'];
}

header('Location:' . $redirect);

# end of file
