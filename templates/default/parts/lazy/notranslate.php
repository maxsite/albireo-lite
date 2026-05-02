<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// Прописывает для <pre> и <code> класс `notranslate`, который запрещает перевод этих тэгов в  translate.google.com

// use.notranslate: +

if (checkStr(getPageData('use.notranslate', false)) === true) {
    echo strRemoveLF('
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll("pre, code").forEach(function (el) {
                    el.classList.add("notranslate");
                });
            });
        </script>');
}

# end of file
