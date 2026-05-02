<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); ?>

{@if $header}
<div class="h2 mar20-tb">{{ lang($header) }}</div>
{@endif}

<nav class="flex flex-wrap">
{@loop $DATA}
    <div class="w31 w48-tablet">
        {@isset $image_large}
            <a href="{{ $page_url }}">{{ hThumb($image_large, wh: $image_large_size ?? '800x600', attr: ['class'=>'thumbnail w100 hover-opacity80 transition-var', 'alt'=>$title]) }}</a>
        {@endisset}

        <div class="t100 mar5-t mar15-b pad5-rl"><a href="{{ $page_url }}">{@if $page_header}{* $page_header *}{@else}{* $title *}{@endif}</a></div>
    </div>
{@endloop}
</nav>