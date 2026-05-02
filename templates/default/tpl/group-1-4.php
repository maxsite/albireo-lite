<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*
echo tpl(
    data: $files['files'],
    tpl: TPL_DIR . 'group-1-4.php',
    add: [
        'wordCount' => 20,
        'before' => '',
        'after' => '',
        'header' => '<h2 class="mar20-tb">header</h2>',
        'description' => '<div class="mar20-tb t-italic">description</div>',

        'favoriteMarker' => '💚', // ⭐️ 🔅 🔸 🔶 💚

        'col1_CountCell' => 2,
        'col1_ImageView' => true,
        'col1_ShowInfo' => true,
        'col1_ShowAnnounce' => true,
        'col1_ContainerClass' => 'grid-2col grid-1col-tablet',

        'col2_ContainerClass' => 'mar20-t grid-3col grid-1col-tablet',
        'col2_ShowInfo' => false,
        'col2_ShowAnnounce' => true,
        ]);
*/
?>
{@ $wordCount = $wordCount ?? 25 @}
{@ $favoriteMarker = $favoriteMarker ?? '⭐️' @}

{@ $col1_CountCell = $col1_CountCell ?? 2 @}
{@ $col1_ImageView = $col1_ImageView ?? false @}
{@ $col1_ShowAnnounce = $col1_ShowAnnounce ?? true @}
{@ $col1_ShowInfo = $col1_ShowInfo ?? true @}
{@ $col1_ContainerClass = $col1_ContainerClass ?? 'grid-2col grid-1col-tablet' @}

{@ $col2_ShowInfo = $col2_ShowInfo ?? true @}
{@ $col2_ShowAnnounce = $col2_ShowAnnounce ?? true @}
{@ $col2_ContainerClass = $col2_ContainerClass ?? 'mar20-t grid-3col grid-1col-tablet' @}
{@ $col2_ImageView = $col2_ImageView ?? true @}

{@empty! $before}{{ $before }}{@endempty}
{@empty! $header}{{ $header }}{@endempty}
{@empty! $description}{{ $description }}{@endempty}

{@ $loopCountFirstCell = $col1_CountCell @}

<div class="grid-var {{ $col1_ContainerClass }}" style="--grid-gap: 20px;">
{@loop $DATA}
    {@if $loopFirstCell}
        <div class="mar20-b">
            {@if $col1_ImageView}{@isset $image_large}
                __(mar15-b) <a href="{{ $page_url }}" >{{ hThumb($image_large, wh: $image_large_size ?? '800x600', attr: ['class'=>'thumbnail w100 hover-img-shadow', 'alt'=>$title]) }}</a>
            {@endisset}{@endif}

            h1(t150 mar0-t mar10-b) <a href="{{ $page_url }}">{* $title *}</a>
            
            {@if $col1_ShowInfo }
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
            {@endif}
            
            {@if $col1_ShowAnnounce }
                {@isset $announce}
                    __(t90 mar10-tb) {{ $announce }} <a class="icon-arrow-right" href="{{ $page_url }}">{@lang Read}</a>
                {@endisset}
            {@endif}
        </div>
    {@else}
        <div class="{@class ['mar10-b pad10-b', 'bor1 bor-dotted-b bor-gray400']}">
            {@if $col2_ImageView}{@isset $image_large}
                __(mar10-b) <a href="{{ $page_url }}" >{{ hThumb($image_large, wh: $image_large_size ?? '800x600', attr: ['class'=>'thumbnail w100 hover-img-shadow', 'alt'=>$title]) }}</a>
            {@endisset}{@endif}
            
            h1(t110 mar0-t mar5-b flex) <a href="{{ $page_url }}">{* $title *}</a> {@check $favorite}<span class="t80 t-right mar3-t">{{ $favoriteMarker }}</span>{@endcheck}

            {@if $col2_ShowInfo }
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
            {@endif}
            
            {@if $col2_ShowAnnounce }
                {@isset $announce}
                    __(t90) {{ strCropWord($announce, $wordCount) }} <a class="icon-arrow-right" href="{{ $page_url }}">{@lang Read}</a>
                {@endisset}
            {@endif}
        </div>
    {@endif}

    {@if $loopSwitchPoint}
        </div><div class="grid-var {{ $col2_ContainerClass }}" style="--grid-gap: 20px;">
    {@endif}

{@endloop}
</div>

{@empty! $after}{{ $after }}{@endempty}
