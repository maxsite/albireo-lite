<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); ?>

<div class="h2 mar20-tb">Shorts</div>

{@loop $DATA}
<div class="{@class ['mar10-b pad10-b b-clearfix', 'bor-gray300 bor1 bor-dotted-b' => !$loopLast]}">
    <details>
        <!-- nosimple -->
        <summary>{{ $title }}
        {@isset $date}
            <span class="t-gray400 dark:t-primary200 t90"> / {{ convertDate($date, 'd-m-Y H:i') }}</span>
        {@endisset}
            
        {@if checkUserAccess(['admin']) }
            <a class="b-inline b-right bi-pencil-square t90" href="{{ $link_for_edit }}">Edit</a>
            <a class="b-inline b-right bi-box-arrow-up-right t90 mar10-r" href="{{ $page_url }}">View</a>
        {@endif}
        </summary>
        <!-- /nosimple -->
        
        <div class="mar10-t">{@contentFile}</div>
    </details>
</div>
{@endloop}
