<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Пример 2 работы с формой
description: Пример 2 работы с формой
# slug: form-demo2
type: system
head-meta[robots]: noindex
parser: -
compress: -
use.alpine: +

**/


$HANDLER = formHandler(__DIR__ . '/form2_handler.php');

?>

<h1>Пример формы</h1>

<p>Эта форма не исчезает после отправки</p>

<div x-data="{...albireoForm()}" class="mar30-tb">
    <form method="post" x-ref="form" @submit.prevent="submitForm('<?= REQUEST_AJAX ?>')">
        <?= METHOD_AJAX ?><?= CSRF ?><?= $HANDLER ?>
        <input type="hidden" name="form[source]" value="<?= htmlspecialchars(CURRENT_URL['urlFull']) ?>">

        <div class="">
            <label class="flex flex-vcenter flex-wrap">
                <div class="w20 w100-tablet">Your name</div>
                <input class="w80 w100-tablet form-input" type="text" name="form[name]" value="<?= htmlspecialchars(cookieOld('form-name')) ?>" placeholder="your name...">
            </label>
        </div>

        <div class="mar20-t">
            <label class="flex flex-vcenter flex-wrap">
                <div class="w20 w100-tablet">Your email</div>
                <div class="w80 w100-tablet">
                    <input class="w100 form-input" type="email" name="form[email]" value="<?= htmlspecialchars(cookieOld('form-email')) ?>" placeholder="your email...">
                </div>
            </label>
        </div>


        <div class="mar20-t">
            <div class="flex flex-wrap">
                <div class="w20 w100-tablet"></div>
                <div class="w80 w100-tablet">
                    <button class="button w100-tablet mar10-b" type="submit"><i class="bi-check"></i>Submit form</button>
                </div>
            </div>
        </div>
    </form>

    <div x-ref="result"></div>
</div>
