<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

# класс ячейки задаётся как columnClass
# echo tpl(data: $files, tpl: TPL_DIR . 'columns-4-1.php', add: ['columnClass' => 'w31', 'header' => 'Заголовок', 'description' => 'Описание']);

$columnClass = $columnClass ?? 'w31';
$wordCount = $wordCount ?? 25;

?>
{@empty! $before}{{$before}}{@endempty}

{@empty! $header}
<div class="h2 mar20-tb">{{ $header }}</div>
{@endempty}

{@empty! $description}
<div class="mar20-tb t-italic">{{ $description }}</div>
{@endempty}

<div class="flex flex-wrap">
    {@loop $DATA}
        <div class="{{ $columnClass }} w100-tablet mar30-b -bor-gray100 -bor-solid -bor1 -rounded3">
            
            {@isset $image_large}
                __(w100) <a href="{{ $page_url }}">{{ hThumb($image_large, wh: $image_large_size ?? '800x600', attr: ['alt/title'=>$title, 'class' =>'-rounded3-t hover-img-gray30']) }}</a>
            {@endisset}
            
            h1(t150) <a href="{{ $page_url }}">{* $title *}</a>
            
            <div class="t90 t-gray">
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
            
            {@isset $announce}
                __(t90 mar10-tb) {{ strCropWord($announce, $wordCount) }}
            {@endisset}
            
        </div>
    {@endloop}
</div>
