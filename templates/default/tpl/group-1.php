<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
// https://icons.getbootstrap.com/

/*
echo tpl(data: $files, tpl: TPL_DIR . 'group-1.php', add: ['header' => 'Заголовок', 'description' => 'Описание']);

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

<div class="flex flex-wrap-tablet mar10-b">
{@loop $DATA}
    {@if $loopFirst}
        <div class="w55 w100-tablet">
            <div class="">
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
                    __(t100 mar10-tb) {{ $announce }} 
                    _ <a class="icon-arrow-right" href="{{ $page_url }}">{@lang Read}</a>
                {@endisset}
            </div>
        </div>
    {@else}
        {@if $loopIndex == 2}<div class="w40 w100-tablet">{@endif}
            <div class="{@class ['mar10-b pad10-b', 'bor1 bor-dotted-b bor-gray400' => !$loopLast]}">
                h1(t110 mar0-t mar5-b) <a href="{{ $page_url }}">{* $title *}</a>

                <div class="t80 t-gray500 dark:t-primary200">
                    {@empty! $date}
                        <span class="bi-calendar mar5-r">{{ convertDate($date, 'd-m-Y') }}</span>
                    {@endempty}

                    {@empty! $category}
                        <span class="bi-bookmark mar5-r">{{ categoryLinks($category) }}</span>
                    {@endempty}

                    {@empty! $tags}
                        <span class="bi-tags">{{ tagLinks($tags) }}</span>
                    {@endempty}
                </div>

                {@isset $announce}
                    __(t90) {{ strCropWord($announce) }}
                {@endisset}
            </div>
        {@if $loopLast}</div>{@endif}
    {@endif}
{@endloop}
</div>
