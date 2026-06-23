<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

/*
echo tpl(data: $files, tpl: TPL_DIR . 'one-column-1.php', add: ['header' => 'Заголовок', 'description' => 'Описание']);

отключить вывод изображения нужно явно указать:
image-noview: +

<div class="mar20-t rounded5 bg-no-repeat bg-size-cover bg-position-center" style="height: 300px; background-image: url({{ $image_small }});"></div>

// https://icons.getbootstrap.com/

Изображение пропорции 1.91:1 
900 х 471
800 х 419

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
    <div class="{@class ['mar30-b pad30-b b-clearfix', 'bor-gray300 bor1 bor-dotted-b' => !$loopLast, 'mar20-t'=>$loopFirst]}">

        {@isset $image_large}{@check! $image_noview}
            <a href="{{ $page_url }}">{{ hThumb($image_large, wh: $image_large_size ?? '800x600', attr: ['class'=>'w100 rounded10 hover-img-gray30', 'alt'=>$title]) }}</a>
        {@endcheck}{@endisset}

        h1(t200 mar10-b) <a class="color-inherit" href="{{ $page_url }}">{* $title *}</a>

        <div class="t90 t-gray500 dark:t-primary200 mar15-b">
            {@isset $date}
                <span class="bi-calendar mar10-r">{{ convertDate($date, 'd-m-Y') }}</span>
            {@endisset}

            {@isset $category}
                <span class="bi-bookmark mar10-r">{{ categoryLinks($category) }}</span>
            {@endisset}

            {@isset $tags}
                <span class="bi-tags">{{ tagLinks($tags) }}</span>
            {@endisset}
        </div>

        {@isset $announce}
            __(mar10-tb) {{ $announce }} 
            __(t-right)  <a class="button t90 icon-arrow-right" href="{{ $page_url }}">{@lang Read}</a>
        {@endisset}

    </div>
{@endloop}