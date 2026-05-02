<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
// https://icons.getbootstrap.com/

/*
echo tpl(data: $files, tpl: TPL_DIR . 'group-4.php', add: ['header' => 'Заголовок', 'description' => 'Описание']);

отключить вывод изображения нужно явно указать:
image-noview: +
*/

// строки расчитываем на основе числа записей, где первые две — основные
$rows = round((count($DATA) - 2) / 2, 0, PHP_ROUND_HALF_EVEN);

?>

{@empty! $before}{{$before}}{@endempty}

{@empty! $header}
<div class="h2 mar20-tb">{{ $header }}</div>
{@endempty}

{@empty! $description}
<div class="mar20-tb t-italic">{{ $description }}</div>
{@endempty}

<div class="mar20-b grid-var grid-var-tablet" style="--grid-columns: 2fr 2fr 1fr 1fr; --grid-rows: repeat({{ $rows }}, 1fr); --grid-gap: 0 20px;">
{@loop $DATA}
    {@if $loopIndex <= 2}
        <div class="grid-item-var" style="--grid-item-row: span {{ $rows }} / span {{ $rows }};">
            {@isset $image_large}{@check! $image_noview}
                __ <a href="{{ $page_url }}" >{{ hThumb($image_large, wh: $image_large_size ?? '800x600', attr: ['class'=>'thumbnail w100 hover-img-gray30', 'alt'=>$title]) }}</a>
            {@endcheck}{@endisset}
            
            h1(t120 mar10-b) <a href="{{ $page_url }}">{* $title *}</a>
            
            {@isset $announce}
                __(t90 mar10-tb) {{ $announce }} 
                _ <a class="icon-arrow-right t-nowrap" href="{{ $page_url }}">{@lang Read}</a>
            {@endisset}
        </div>
    {@else}
        <div>
            h3(t100 mar5-t mar10-b) <a href="{{ $page_url }}">{* $title *}</a>
            
            {@isset $announce}
                __(t90 mar10-tb) {{ strCropWord($announce, 7) }}
            {@endisset}
            
        </div>
    {@endif}
{@endloop}
</div>
