<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*
    блок ссылок для пагинации
*/
?>

{@if $max > 1}
<nav class="mar30-tb w100 flex flex-vcenter flex-wrap-tablet">
    <div class="flex-grow1 w100-tablet t-gray600 mar10-tb">{@lang Go to page}: 
        <select class="mar10-l form-input"  onchange="if (this.value != 'current') {window.location.href = this.value} ">
        {@foreach $pagLinks as $url => $num}
            <option value="{* $url *}" {@if $url == 'current'}selected class="t-bold"{@endif}>{{ $num }}</option>
        {@endforeach}
        </select>
    </div>

    {@if $prevLink}
        <div class="flex-grow0 mar20-r"><a rel="prev" href="{{ $prevLink }}">← {@lang Previous page}</a></div>
    {@endif}
    
    {@if $nextLink}
        <div class="flex-grow0 t-right"><a rel="next" href="{{ $nextLink }}">{@lang Next page} →</a></div>
    {@endif}
</nav>
{@endif}
