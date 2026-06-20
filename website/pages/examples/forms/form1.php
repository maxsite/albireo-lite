<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Пример работы с формой
description: Пример работы с формой
# slug: form-demo
type: system
head-meta[robots]: noindex
parser: -
compress: -
use.alpine: +

**/

$HANDLER = formHandler(__DIR__ . '/form1_handler.php');

?>

<h1>Пример формы</h1>

<div x-data="{...albireoForm(), agreement: true}" class="mar30-tb">

    <p x-show="!result || hasErrors">Заполните поля и отправьте форму.</p>
    
    <form method="post" x-show="!result || hasErrors" x-transition x-ref="form" @submit.prevent="submitForm('<?= REQUEST_AJAX ?>')">
        
        <?= METHOD_AJAX ?><?= CSRF ?><?= $HANDLER ?>

        <input type="hidden" name="form[source]" value="<?= htmlspecialchars(CURRENT_URL['urlFull']) ?>">

        <div class="">
            <label class="flex flex-vcenter flex-wrap">
                <div class="w20 w100-tablet">Your name *</div>
                <input class="w80 w100-tablet form-input" type="text" name="form[name]" value="<?= htmlspecialchars(cookieOld('form-name')) ?>" placeholder="your name..." required>
            </label>
        </div>

        <div class="mar20-t">
            <label class="flex flex-wrap">
                <div class="w20 w100-tablet">Your email *</div>
                <div class="w80 w100-tablet">
                    <input class="w100 form-input" type="email" name="form[email]" value="<?= htmlspecialchars(cookieOld('form-email')) ?>" placeholder="your email..." required>
                </div>
            </label>
        </div>

        <div class="mar20-t">
            <label class="flex flex-wrap">
                <div class="w20 w100-tablet">Your site</div>
                <div class="w80 w100-tablet">
                    <input class="w100 form-input" type="url" name="form[site]" value="" placeholder="your site...">
                </div>
            </label>
        </div>
        
        <div class="mar20-t">
            <label class="flex flex-wrap">
                <div class="w20 w100-tablet">Your IP</div>
                <div class="w80 w100-tablet">
                    <input class="w100 form-input" type="text" name="form[ip]" value="" placeholder="your ip...">
                </div>
            </label>
        </div>

        <div class="mar20-t">
            <label class="flex flex-wrap">
                <div class="w20 w100-tablet">Your messager</div>
                <div class="w80 w100-tablet">
                    <select class="w100 form-input" name="form[messager]">
                        <option value="Telegram">Telegram</option>
                        <option value="Viber">Viber</option>
                        <option value="WhatsApp">WhatsApp</option>
                        <option value="Signal">Signal</option>
                    </select>
                </div>
            </label>
        </div>

        <div class="mar20-t">
            <div class="b-flex flex-wrap">
                <div class="w20 w100-tablet"></div>
                <div class="w80 w100-tablet">
                    <label class="form-checkbox">
                        <input type="checkbox" name="form[color][]" value="red">
                        <span class="form-checkbox-icon"></span> Red
                    </label>

                    <label class="form-checkbox mar20-l">
                        <input type="checkbox" name="form[color][]" value="green">
                        <span class="form-checkbox-icon"></span> Green
                    </label>

                    <label class="form-checkbox mar20-l">
                        <input type="checkbox" name="form[color][]" value="blue">
                        <span class="form-checkbox-icon"></span> Blue
                    </label>
                    
                    <label class="form-checkbox mar20-l">
                        <input type="checkbox" name="form[check]" value="on">
                        <span class="form-checkbox-icon"></span> On/off
                    </label>
                    
                    <label class="form-switch mar20-l">
                        <input type="checkbox" name="form[switch]" value="on">
                        <span class="form-switch-icon"></span> On/Off
                    </label>
                    
                </div>
            </div>
        </div>
        
        <div class="mar20-t">
            <div class="b-flex flex-wrap">
                <div class="w20 w100-tablet"></div>
                <div class="w80 w100-tablet">
                    <input class="form-input" type="number" name="form[number_float]" value="0" min="-5" max="10" step=".1">
                    <input class="form-input" type="number" name="form[number_int]" value="-1" min="-5" max="10" step="1">
                    <input class="form-input" type="date" name="form[date]" value="<?= date('Y-m-d') ?>">
                    <input class="form-input" type="time" name="form[time]" value="<?= date('H:i') ?>">
                    <input class="mar20-l" type="range" name="form[range]" value="1" min="0" max="10" step="1">
                </div>
            </div>
        </div>
        
        <div class="mar20-t">
            <div class="b-flex flex-wrap">
                <div class="w20 w100-tablet"></div>
                <div class="w80 w100-tablet">
                    <input title="BASE64 chars" class="form-input" type="text" name="form[str_base64]" value="0J/RgNC40LLQtdGCIQ==">
                </div>
            </div>
        </div>

        <div class="mar20-t">
            <label class="flex flex-wrap">
                <div class="w20 w100-tablet pad5-r">Your message *</div>
                <textarea class="w80 w100-tablet h100px form-input" name="form[message]" required></textarea>
            </label>
        </div>

        <div class="mar20-t">
            <div class="flex flex-wrap">
                <div class="w20 w100-tablet"></div>
                <div class="w80 w100-tablet">
                    <button class="button w100-tablet mar10-b" type="submit" :disabled="!agreement"><i class="bi-check"></i>Submit form</button>

                    <label class="pad10-l b-inline">
                        <input type="checkbox" x-model="agreement"> I agree to the processing of personal data
                    </label>
                </div>
            </div>
        </div>
    </form>

    <div x-ref="result"></div>
</div>
