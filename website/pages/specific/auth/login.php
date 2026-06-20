<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Login Form
description: Login Form
slug: login
head-meta[robots]: noindex
type: system
parser: -

 **/

// если есть залогинненость, то форму не выводим
if (getUser()) {
    echo '<div class="mar30-tb t-center"><a class="button bi-unlock" href="' . SITE_URL . 'logout">Logout</a> <a class="mar20-l bi-house" href="' . SITE_URL . '">' . lang('To the home page') . ' ➝</a></div>';
    
    return;
} else {
    // возможно уже есть залогиненность, но без разрешения
    if ($username = getUser(true)) {
        echo '<div class="mar30-tb t-center"><a class="button bi-unlock" href="' . SITE_URL . 'logout">Logout (' . $username . ')</a> <a class="mar20-l bi-house" href="' . SITE_URL . '">' . lang('To the home page') . ' ➝</a></div>';

        return;
    }
}

$HANDLER = formHandler(__DIR__ . '/login_handler.php');

?>
<div x-data="{...albireoForm()}" class="mar30-tb">

    <div class="h3"><?= lang('Enter your login and password') ?></div>

    <form method="post" x-ref="form" @submit.prevent="submitForm('<?= REQUEST_AJAX ?>')">
        <?= METHOD_AJAX ?><?= CSRF ?><?= $HANDLER ?>
        
        <div>
            <label class="flex flex-vcenter flex-wrap">
                <div class="w20 w100-tablet"><?= lang('Your login') ?></div>
                <input class="w80 w100-tablet form-input" type="text" name="form[login]" value="" placeholder="<?= htmlspecialchars(lang('your login')) ?>..." required>
            </label>
        </div>

        <div class="mar20-t">
            <label class="flex flex-vcenter flex-wrap">
                <div class="w20 w100-tablet"><?= lang('Your password') ?></div>
                <div class="w80 w100-tablet">
                    <input class="w100 form-input" type="password" name="form[password]" value="" placeholder="<?= htmlspecialchars(lang('your password')) ?>..." required>
                </div>
            </label>
        </div>

        <div class="mar20-tb">
            <div class="flex flex-wrap">
                <div class="w20 w100-tablet"></div>
                <div class="w80 w100-tablet">
                    <button class="button bi-unlock2" type="submit"><?= lang('Entrance') ?></button>
                    <?php if (getConfig('registerUsers', false)) : ?>
                    <a class="mar20-l bi-person-plus" href="<?= SITE_URL ?>register"><?= lang('Register') ?></a>
                    <?php endif; ?>
                    <a class="mar20-l bi-house" href="<?= SITE_URL ?>"><?= lang('To the home page') ?></a>
                </div>
            </div>
        </div>
    </form>

    <div x-ref="result"></div>
</div>
