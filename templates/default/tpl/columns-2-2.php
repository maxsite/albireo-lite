<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

# класс ячейки задаётся как columnClass
# echo tpl(data: $files['files'], tpl: TPL_DIR . 'columns-2-2.php', add: ['columnClass' => 'w31', 'header' => 'Заголовок', 'description' => 'Описание']);

?>
{@ $columnClass = $columnClass ?? 'w31' @}
{@ $wordCount = $wordCount ?? 25 @}

{@empty! $before}{{ $before }}{@endempty}

{@empty! $header}
<div class="h2 mar20-tb">{{ $header }}</div>
{@endempty}

{@empty! $description}
<div class="mar20-tb t-italic">{* $description *}</div>
{@endempty}

<div class="flex-wrap {@class ['flex'=>count($DATA)>2, 'b-flex gap30'=>count($DATA)<3]}">
    {@loop $DATA}
        <div class="{{ $columnClass }} w100-tablet">
            <div class="b-flex flex-column h100">
                {@isset $image_large}
                    __(w100) <a href="{{ $page_url }}">{{ hThumb($image_large, wh: $image_large_size ?? '800x600', attr: ['alt/title'=>$title, 'class' =>'thumbnail hover-img-shadow']) }}</a>
                {@endisset}
                
                <div class="w100 flex-grow2 pad10-t h200px-min mar10-b">
                    h1(t110) <a href="{{ $page_url }}">{* $title *}</a>
                    
                    {@isset $announce}
                        __(t90) {{ strCropWord($announce, $wordCount) }} <a class="icon-arrow-right" href="{{ $page_url }}">{@lang Read}</a>
                    {@endisset}
                </div>
                
                <div class="w100 t90 t-gray500 dark:t-primary200 bor1 bor-gray100 bor-solid-t pad10-t">
                    <div class="t80 t-gray500 dark:t-primary200 mar15-b flex">
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
            </div>
        </div>
    {@endloop}
</div>
