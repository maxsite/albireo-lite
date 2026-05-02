<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: 📋️ Анализ рубрик сайта
date: 2025-07-14 12:00
file-page-data: prompts.php
prompt.nocontent: +

**/

if (noUserAccess(message: 'Access denied!')) return;

$HANDLER = formHandler('categoryPagesPrompts_handler');

$catList = '';

foreach (categoryGetAll() as $cat => $data) {
    $catList .= '<option value="' . htmlspecialchars($cat) . '">' . htmlspecialchars($data['title']) . '</option>';
}

$promptFrames = '';

foreach (getConfigFile(__DIR__ . '/analize-config.php') as $frame) {
    $promptFrames .= '<option value="' . htmlspecialchars($frame['content'] ?? 'no content') . '">' . htmlspecialchars($frame['title'] ?? 'no title') . '</option>';
}

?>
<div x-data="{...albireoForm()}" class="mar30-tb">
    <form method="post" x-ref="form" @submit.prevent="submitForm('<?= REQUEST_AJAX ?>')">
        <?= METHOD_AJAX ?><?= CSRF ?><?= $HANDLER ?>

        <div class="mar20-t">
            <label class="flex flex-wrap">
                <div class="w20 w100-tablet"><?= lang('Category') ?></div>
                <div class="w80 w100-tablet">
                    <select @change="$refs.form.requestSubmit()" class="form-input" name="_handler_func_arg1">
                        <?= $catList ?>
                    </select>

                    <select @change="$refs.form.requestSubmit()" class="form-input mar5-l" name="_handler_func_arg3">
                        <option value="10">10 записей</option>
                        <option value="20">20 записей</option>
                        <option value="30">30 записей</option>
                        <option value="50">50 записей</option>
                        <option value="100" selected>100 записей</option>
                        <option value="500">500 записей</option>
                        <option value="1000">1000 записей</option>
                    </select>

                    <select @change="$refs.form.requestSubmit()" class="form-input mar5-l" name="_handler_func_arg4">
                        <option value="DESC" selected>Новые вверху</option>
                        <option value="ASC">Старые вверху</option>
                    </select>

                </div>
            </label>
        </div>

        <div class="mar20-t">
            <label class="flex flex-wrap">
                <div class="w20 w100-tablet">Тип промпта</div>
                <div class="w80 w100-tablet">
                    <select @change="$refs.form.requestSubmit()" class="w100 form-input" name="_handler_func_arg2">
                        <?= $promptFrames ?>
                    </select>
                </div>
            </label>
        </div>

        <div class="mar20-t">
            <div class="flex flex-wrap">
                <div class="w20 w100-tablet"></div>
                <div class="w80 w100-tablet">
                    <button class="button" type="submit">Получить промпт</button>
                    <button class="js-clipboard button b-right" data-clipboard-target="#copyResult">Скопировать</button>
                </div>
            </div>
        </div>
    </form>

    <pre x-ref="result" id="copyResult">...</pre>
</div>
