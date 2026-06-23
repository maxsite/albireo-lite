<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 
// https://icons.getbootstrap.com/

/*
echo tpl(data: $files, tpl: TPL_DIR . 'one-columns-4.php', add: ['header' => 'Заголовок', 'description' => 'Описание']);

отключить вывод изображения нужно явно указать:
image-noview: +
*/
?>

{@empty! $before}{{$before}}{@endempty}

{@empty! $header}
<div class="h2 mar20-tb">{{ $header }}</div>
{@endempty}

{@empty! $description}
<div class="mar20-tb t-italic">{{ $description }}</div>
{@endempty}

{@loop $DATA}
    <div class="flex flex-wrap-tablet pad20-b mar30-b {@class ['bor-gray300 bor1 bor-dotted-b' => !$loopLast, 'mar20-t' => $loopFirst]}">
        <div class="w300px-min w30 w100-tablet mar20-b-tablet {@class ['flex-order2'=>$loopEven]}">
            {@isset $image_large}{@check! $image_noview}
                <a href="{{ $page_url }}" >{{ hThumb($image_large, wh: $image_large_size ?? '800x600', attr: ['class'=>'thumbnail w100 hover-img-gray30', 'alt'=>$title]) }}</a>
            {@endcheck}{@endisset}
        </div>
        
        <div class="w70 pad0-tablet w100-tablet {@class ['pad20-r'=> $loopEven, 'pad20-l'=> $loopOdd]}">
            h1(t150 mar10-b) <a href="{{ $page_url }}">{* $title *}</a>
        
            <div class="t90 t-gray500 dark:t-primary200">
                {@empty! $date}
                    <span class="bi-calendar mar10-r">{{ convertDate($date, 'd-m-Y') }}</span>
                {@endempty}

                {@empty! $category}
                    <span class="bi-bookmark mar10-r">{{ categoryLinks($category) }}</span>
                {@endempty}

                {@empty! $tags}
                    <span class="bi-tags">{{ tagLinks($tags) }}</span>
                {@endempty}
            </div>

            {@isset $announce}
                __(t90 mar10-tb) {{ $announce }} <a class="icon-arrow-right" href="{{ $page_url }}">{@lang Read}</a>
            {@endisset}
        </div>
    </div>
{@endloop}