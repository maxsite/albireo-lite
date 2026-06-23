<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

# для вывода списка записей landihgs

# echo tpl(data: $files, tpl: TPL_DIR . 'landing-list.php', add: ['header' => 'Landing pages <sup>' . count($files) . '</sup>']);

$old_subdirs = '';
?>
{@empty! $before}{{$before}}{@endempty}

{@empty! $header}
<div class="h2 mar20-tb">{{ $header }}</div>
{@endempty}

{@empty! $description}
<div class="mar20-tb t-italic">{{ $description }}</div>
{@endempty}

{@loop $DATA}
    <div class="{@class ['mar5-b pad5-b b-clearfix', 'mar30-t'=>$loopFirst]}">
        {@if $subdirs != $old_subdirs}
            <hr>
            {@isset $landing_copyright}<h6><a class="icon-arrow-right t-gray600 dark:t-primary200" target="_blank" href="{{$landing_copyright}}">{{ $subdirs }}</a></h6>
            {@else}<h6 class="t-gray600 dark:t-primary200">{{ $subdirs }}</h6>
            {@endisset}
            {@ $old_subdirs = $subdirs @}
        {@endif}
        
        h1(t120 mar0) <a href="{{ $page_url }}">{* $title *}</a>
    </div>
{@endloop}
