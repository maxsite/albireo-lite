<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

# echo tpl(data: $files, tpl: TPL_DIR . 'one-column-2.php', add: ['header' => 'Заголовок', 'description' => 'Описание']);

?>
{@empty! $before}{{$before}}{@endempty}

{@empty! $header}
<div class="h2 mar20-tb">{{ $header }}</div>
{@endempty}

{@empty! $description}
<div class="mar20-tb t-italic">{{ $description }}</div>
{@endempty}

{@loop $DATA}
    <div class="{@class ['mar20-b pad20-b b-clearfix', 'bor-gray300 bor1 bor-dotted-b' => !$loopLast, 'mar30-t'=>$loopFirst]}">
        h1(t180 mar10-b) <a href="{{ $page_url }}">{* $title *}</a>

        {@isset $announce}
            __(t90 mar10-tb) {{ $announce }} <a class="icon-arrow-right" href="{{ $page_url }}">{@lang Read}</a>
        {@endisset}
    </div>
{@endloop}
