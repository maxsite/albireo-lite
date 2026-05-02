<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

# класс ячейки задаётся как columnClass
# echo tpl(data: $files, tpl: TPL_DIR . 'columns-1.php', add: ['columnClass' => 'w31', 'header' => 'Заголовок', 'description' => 'Описание']);

$columnClass = $columnClass ?? 'w48';
$wordCount = $wordCount ?? 15;

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
        <div class="{{ $columnClass }} w100-tablet mar30-b">
            
            <h1 class="mar0-t t120"><a class="icon-arrow-right" href="{{ $page_url }}">{* $title *}</a></h1>
            
            {@isset $announce}
                <div class="t90 animation-fade mar10-b">{{ strCropWord($announce, $wordCount) }}</div>
            {@endisset}
            
            <div class="t80 t-gray500 dark:t-primary200 mar15-b">
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
        </div>
    {@endloop}
</div>
