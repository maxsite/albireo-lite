<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*

Подсветка кода

https://highlightjs.org/
https://highlightjs.org/examples
https://cdnjs.com/libraries/highlight.js

# подключение
use.highlight: +

# цветовая тема по умолчанию (см. https://highlightjs.org/examples)
use.highlight.theme: default

# цветовая тема для dark-режима Berry CSS
use.highlight.theme-dark: github-dark

<pre class="hl">
... тут код с подсветкой ...
</pre>

*/

// серекторы на которые будет срабатывать подсветка
$selectors = 'pre.hl, pre.php, pre.js, pre.html, pre.css, pre.sass, pre.scss, pre.python';

if (checkStr(getPageData('use.highlight', false)) === true) : 
    $themeDefault = getPageData('use.highlight.theme', 'default');
    $themeDark = getPageData('use.highlight.theme-dark', 'github-dark');

?>
<script>document.head.appendChild(Object.assign(document.createElement('link'), {rel:'stylesheet',href:localStorage.getItem(KEY_THEME_DARK)==='dark'?'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/<?= $themeDark ?>.min.css':'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/<?= $themeDefault ?>.min.css'}));</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad(); document.addEventListener('DOMContentLoaded', (event) => {document.querySelectorAll('<?= $selectors ?>').forEach((block) => {hljs.highlightBlock(block); });});</script>
<?php endif ?>
