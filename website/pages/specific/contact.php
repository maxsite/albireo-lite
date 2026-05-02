<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Обратная связь
description: Обратная связь

lang.uk[title]: Зворотній зв'язок
lang.uk[description]: Зворотній зв'язок

lang.en[title]: Feedback
lang.en[description]: Feedback

html[lang]: <?= getConfig('userLang', 'en') ?>

slug: contact
type: system
head-meta[robots]: noindex
parser: -
compress: -
use.alpine: +

**/

if ($t = sentLast()) {
    echo '<div class="mar20-tb">' . lang('You are submitting the form too many times. Please try again in at least') . ' ' . $t . ' ' . plur($t, 'a second', 'seconds@2', 'seconds@5') . '.</div>';
    
    return;
}

$HANDLER = formHandler(__DIR__ . '/contact_handler.php');

$contactDescription = getConfig('contactDescription', false);

if ($contactDescription === false) 
    $contactDescription = lang('Please complete and submit this form to contact the site owner.');

?>

<h1><?= lang('Feedback') ?></h1>

<div x-data="{...albireoForm(), agreement: true}" class="mar30-tb">
    <p x-show="!result || hasErrors"><?= $contactDescription ?></p>

    <form method="post" x-show="!result || hasErrors" x-transition x-ref="form" @submit.prevent="submitForm('<?= REQUEST_AJAX ?>')">
    
        <?= METHOD_AJAX ?><?= CSRF ?><?= $HANDLER ?>
        
        <?php /*
        поле form[confirm] скрыто — это защита honeypot от спама
        его нужно оформить как можно ближе к другим полям
        */ ?>
        <div class="b-hide">
            <label class="flex flex-vcenter flex-wrap mar20-b">
                <div class="w20 w100-tablet">Write the word "ok" *</div>
                <input class="w80 w100-tablet form-input" type="text" name="form[confirm]" placeholder="Write the word &quot;ok&quot;">
            </label>
        </div>
        
        <div class="">
            <label class="flex flex-vcenter flex-wrap">
                <div class="w20 w100-tablet"><?= lang('Your name') ?> *</div>
                <input class="w80 w100-tablet form-input" type="text" name="form[name]" value="<?= htmlspecialchars(sessionOld('form-name')) ?>" placeholder="<?= lang('your name') ?>..." required>
            </label>
        </div>

        <div class="mar20-t">
            <label class="flex flex-vcenter flex-wrap">
                <div class="w20 w100-tablet"><?= lang('Your email') ?> *</div>
                <div class="w80 w100-tablet">
                    <input class="w100 form-input" type="email" name="form[email]" value="<?= htmlspecialchars(sessionOld('form-email')) ?>" placeholder="<?= lang('your email') ?>..." required>
                </div>
            </label>
        </div>

        <div class="mar20-t">
            <label class="flex flex-wrap">
                <div class="w20 w100-tablet pad5-r"><?= lang('Your question') ?> *</div>
                <textarea class="w80 w100-tablet h200px form-input" name="form[message]" required></textarea>
            </label>
        </div>

        <div class="mar20-t">
            <div class="flex flex-wrap">
                <div class="w20 w100-tablet"></div>
                <div class="w80 w100-tablet">
                    <button class="button w100-tablet mar10-b" type="submit" :disabled="!agreement"><i class="bi-check"></i><?= lang('Submit form') ?></button>
                    
                    <label class="pad10-l b-inline">
                        <input type="checkbox" x-model="agreement" class="t-primary500"> <?= lang('I agree to the processing of personal data') ?>
                    </label>
                </div>
            </div>
        </div>
    </form>

    <div x-ref="result"></div>
</div>
