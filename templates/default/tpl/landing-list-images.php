<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

# для вывода списка записей landihgs

$old_subdirs = '';
?>
{@empty! $before}{{$before}}{@endempty}

{@empty! $header}
<div class="h2 mar20-tb">{{ $header }}</div>
{@endempty}

{@empty! $description}
<div class="mar20-tb t-italic">{* $description *}</div>
{@endempty}

<div class="flex flex-wrap">

{@loop $DATA}
    {@if $subdirs != $old_subdirs}
        <div class="w100 pad10-rl pad3-tb t100 bg-primary100 dark:bg-primary700 mar15-b rounded10">{{ strUcFirst($subdirs) }} {@isset $landing_copyright}<a class="b-inline b-right" target="_blank" href="{{$landing_copyright}}"><i class="bi-link icon0"></i></a>{@endisset}</div>
        {@ $old_subdirs = $subdirs @}
    {@endif}
    
    <div class="w31 w100-tablet mar30-b t-ellipsis">
        <div class="mar10-b">
            {@isset $image_large}
                <a href="{{ $page_url }}"><img class="w100 rounded20 hover-img-scale" src="{{ $image_large }}" alt="{* $title *}" title="{* $title *}"></a>
            {@endisset}
        </div>
        h1(t90 mar0) <a href="{{ $page_url }}">{* $title *}</a>
    </div>
    
{@endloop}

</div>