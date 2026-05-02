<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
// https://icons.getbootstrap.com/

/*
echo tpl(data: $files, tpl: TPL_DIR . 'group-2.php', add: ['header' => 'Заголовок', 'description' => 'Описание']);

отключить вывод изображения нужно явно указать:
image-noview: +
*/

// колво записей в первой линии
if (empty($firstLine)) $firstLine = 2;

// класс для ячеек первой линии
if (empty($columnClass)) $columnClass = 'w48';

// класс для ячеек остальных линий
if (empty($columnClass2)) $columnClass2 = 'w31';

?>

{@empty! $before}{{$before}}{@endempty}

{@empty! $header}
<div class="h2 mar20-tb">{{ $header }}</div>
{@endempty}

{@empty! $description}
<div class="mar20-tb t-italic">{{ $description }}</div>
{@endempty}

{@loop $DATA}
    {@if $loopIndex <= $firstLine}
        {@if $loopFirst}<div class="flex flex-wrap-tablet mar20-b">{@endif}
            <div class="{{ $columnClass }} w100-tablet">
                {@isset $image_large}{@check! $image_noview}
                    __ <a href="{{ $page_url }}" >{{ hThumb($image_large, wh: $image_large_size ?? '800x600', attr: ['class'=>'thumbnail w100 hover-img-gray30', 'alt'=>$title]) }}</a>
                {@endcheck}{@endisset}
            
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
                    __(t90 mar10-tb) {{ $announce }} <a class="icon-arrow-right t-nowrap" href="{{ $page_url }}">{@lang Read}</a>
                {@endisset}
            </div>
        {@if $loopIndex == $firstLine or $loopLast}</div>{@endif}
    {@endif}
    
    {@if $loopIndex > $firstLine}
        {@if $loopIndex == ($firstLine + 1)}<div class="flex flex-wrap mar20-b">{@endif}
            <div class="{{ $columnClass2 }} w100-tablet mar20-b">
                {@isset $image_large}{@check! $image_noview}
                    __ <a href="{{ $page_url }}" >{{ hThumb($image_large, width: 800, height: 600, attr: ['class'=>'thumbnail w100 -hover-img-gray30', 'alt'=>$title]) }}</a>
                {@endcheck}{@endisset}
            
                h1(t120 mar10-b) <a href="{{ $page_url }}">{* $title *}</a>

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
                    __(t90 mar10-tb) {{ strCropWord($announce) }} <a class="icon-arrow-right t-nowrap" href="{{ $page_url }}">{@lang Read}</a>
                {@endisset}
            </div>
        {@if $loopLast}</div>{@endif}
    {@endif}
{@endloop}
