<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: <?= lang('User') ?>
description: [title]
slug: user
head-meta[robots]: noindex
type: system
parser: -
use.clipboard: +

 **/

// если запрещены регистрации или уже есть залогинненость, то уходим на главную
if (!getUser('login') or !getUser()) {
    echo extras('access-denied.php');
    return;
}

$user = getUser();

// pr($user);
?>

<div class="w100px h100px b-right t400"><?= htmlspecialchars($user['emoji']) ?></div>

<h2>User <b><?= htmlspecialchars($user['nickname']) ?></b></h2>

<ul>
<li><b>Login:</b> <?= htmlspecialchars($user['login']) ?></li>
<li><b>Nickname:</b> <?= htmlspecialchars($user['nickname']) ?></li>
<li><b>Email:</b> <?= htmlspecialchars($user['email']) ?></li>
<li><b>Level:</b> <?= htmlspecialchars($user['level']) ?></li>
</ul>

<?php
// если у юзера разрешено работать с API
if (!empty($user['api_id'])) new \Api\Api()->user($user);

# end of file