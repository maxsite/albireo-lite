<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// Разделение блоков https://split.js.org/
// use.splitjs: +

if (checkStr(getPageData('use.splitjs', false)) === true) {
    echo '<script src="' . RESOURCES_URL . 'splitjs/split.min.js" defer></script>';
}

/*
<div class="flex">
    <textarea id="split-0" class="w80></textarea>
    <div id="split-1" class="w20"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        Split(["#split-0", "#split-1"], {
            sizes: [80, 20],
            minSize: [300, 0],
        })
    });
    
    // или с запоминанием размеров

    document.addEventListener("DOMContentLoaded", () => {
        var sizes = localStorage.getItem('editor-split-sizes')

        if (sizes) {
            sizes = JSON.parse(sizes);
        } else {
            sizes = [80, 20];
        }

        var split = Split(["#split-0", "#split-1"], {
            sizes: sizes,
            minSize: [300, 0],
            onDragEnd: function (sizes) {
                localStorage.setItem('editor-split-sizes', JSON.stringify(sizes))
            },
        })
    });
</script>            

<style>
.gutter {
    background-color: var(--primary100);
    background-repeat: no-repeat;
    background-position: 50%;
}

.gutter.gutter-horizontal {
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAeCAYAAADkftS9AAAAIklEQVQoU2M4c+bMfxAGAgYYmwGrIIiDjrELjpo5aiZeMwF+yNnOs5KSvgAAAABJRU5ErkJggg==');
    cursor: col-resize;
}
</style>

*/

# end of file
