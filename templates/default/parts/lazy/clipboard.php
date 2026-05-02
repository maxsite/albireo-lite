<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*

https://clipboardjs.com/

use.clipboard: +

<pre class="hl" id="my1">
... тут код с подсветкой ...
</pre>

<button class="js-clipboard button" data-clipboard-target="#my1">Скопировать</button>

либо можно прописать класс у pre copy-txt

```copy-txt
текст
```
 */

if (checkStr(getPageData('use.clipboard', false)) === true) : 

?>
<script src="<?= RESOURCES_URL ?>clipboard/clipboard.min.js"></script>
<script>new ClipboardJS('.js-clipboard');</script>
<script> 
document.addEventListener("DOMContentLoaded", function () {
const blocks = document.querySelectorAll(".copy-txt");
blocks.forEach((block, index) => {
const text = block.textContent;
const button = document.createElement("button");
button.className = "copy-btn";
button.textContent = "📋";
button.setAttribute("data-clipboard-text", text);
button.setAttribute("title", "Copy to Clipboard");
button.style.position = "absolute";
button.style.top = "10px";
button.style.right = "10px";
button.style.zIndex = "10";

const wrapper = document.createElement("div");
wrapper.style.position = "relative";
block.parentNode.insertBefore(wrapper, block);
wrapper.appendChild(block);
wrapper.appendChild(button);
});
new ClipboardJS('.copy-btn');
});
</script> 
<?php endif ?>