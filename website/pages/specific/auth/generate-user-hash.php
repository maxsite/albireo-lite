<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Генератор хэша для пользователя
slug: generate-user-hash
type: system
layout: full-width.php
css.layout: nofields.css
headers: -
footers: -
head-meta[robots]: noindex
parser: -
compress: -
use.alpine: +
use.alpine-ajax: +

# разрешаем доступ к странице только тем, у кого есть разрешение admin
# для того, чтобы разрешить всем пользователям видеть эту страницу, закомментируйте это поле
user-level: admin

**/

// если пользователи уже есть, то проверяем их разрешение
// если нет, то показываем эту страницу в любом случае
if (getConfigFile(CONFIG_DIR . 'users.php', default: [])) {
    if (noUserAccess(message: '<h2 class="t-center">Access denied</h2>')) return;
}

$HANDLER = formHandler('generateUserHash_handler');

// случайный ключ, который можно использовать как secretKey
$random = hash('sha256', bin2hex(random_bytes(16)) . time());

?>

<div x-data="{...albireoForm()}" class="mar30-tb w800px-max layout-center">
    <form method="post" x-transition x-ref="form" @submit.prevent="submitForm('<?= REQUEST_AJAX ?>')">
        <?= METHOD_AJAX ?><?= CSRF ?><?= $HANDLER ?>
        <div>
            <label class="flex flex-vcenter flex-wrap">
                <div class="w20 w100-tablet">User login</div>
                <input class="w80 w100-tablet form-input" type="text" name="form[name]" placeholder="user name...">
            </label>
        </div>

        <div class="mar20-t">
            <label class="flex flex-vcenter flex-wrap">
                <div class="w20 w100-tablet">User password</div>
                <div class="w80 w100-tablet">
                    <input class="w100 form-input mar5-b" id="password" type="text" name="form[password]" placeholder="user password...">
                    <div id="strengthMessage"></div>
                </div>
            </label>
        </div>
        
        <div class="mar20-t">
            <label class="flex flex-wrap">
                <div class="w20 w100-tablet">Random secret:</div>
                <div class="w80 w100-tablet"><?= $random ?></div>
            </label>
        </div>
        
        <div class="mar30-tb"><button class="button button1 w100-tablet mar10-b bi-check" type="submit">Generate hash</button> <a class="b-inline b-right icon-arrow-right" href="<?= SITE_URL ?>">Home</a></div>
    </form>

    <div x-html="result" class="t-mono"></div>
</div>

<script>
function calculateEntropy(password) {
    let charsetSize = 0;
    if (/[a-z]/.test(password)) charsetSize += 26;
    if (/[A-Z]/.test(password)) charsetSize += 26;
    if (/[0-9]/.test(password)) charsetSize += 10;
    if (/[^A-Za-z0-9]/.test(password)) charsetSize += 32;
    const entropy = password.length * Math.log2(charsetSize);
    return Math.round(entropy);
}

function getStrengthClass(entropy) {
    if (entropy < 28) return 't-red600';
    if (entropy < 36) return 't-orange600';
    if (entropy < 60) return 't-blue600';
    return 't-green600';
}

function getStrengthMessage(entropy) {
    if (entropy < 28) return 'Very weak password  😬';
    if (entropy < 36) return 'Weak password 😕';
    if (entropy < 60) return 'Moderate password 🙂';
    if (entropy < 80) return 'Strong password 😎';
    return 'Excellent password 🔐';
}

const passwordInput = document.getElementById('password');
const strengthMessage = document.getElementById('strengthMessage');
passwordInput.addEventListener('input', () => {
    const entropy = calculateEntropy(passwordInput.value);
    const message = `${getStrengthMessage(entropy)} (${entropy} bit)`;
    const className = getStrengthClass(entropy);
    strengthMessage.textContent = message;
    strengthMessage.className = className;
});
</script>