<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

# класс ячейки задаётся как columnClass
# echo tpl(data: $files, tpl: TPL_DIR . 'columns-5.php', add: ['columnClass' => 'w48', 'header' => 'Заголовок', 'description' => 'Описание', 'wordCount' => 25, 'before' => '']);

$columnClass = $columnClass ?? 'w48';
$wordCount = $wordCount ?? 25;

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
        <div class="{{ $columnClass }} w100-tablet mar40-b b-shadow3 bg-primary50 dark:bg-primary700 pad10 rounded10 -gr-linear-bottom-left" style="--gr-start: var(--primary50); --gr-end: var(--primary150);">
            
            <div class="h100 grid-var grid-var-tablet" style="--grid-gap: 20px; --grid-columns: 5fr 9fr; --grid-columns-tablet: auto;">
                {@isset $image_large}
                    <div class="hover-img-opacity1 bor-primary100 rounded10 bor-solid bor3 bg-no-repeat bg-size-cover bg-position-center" style="min-height: 250px; background-image: url({{ $image_large }})">
                        <a class="b-inline h100 w100" href="{{ $page_url }}"></a>
                    </div>
                {@else}
                    <div class="hover-img-opacity1 bor-primary100 rounded10 bor-solid bor3 bg-primary300" style="min-height: 250px;">
                        <a class="b-inline h100 w100" href="{{ $page_url }}"></a>
                    </div>
                {@endisset}
            
                <div>
                    <div class="t80 t-primary500 pad5-t">
                        {@isset $date}
                            <span class="bi-calendar mar10-r">{{ convertDate($date, 'd-m-Y') }}</span>
                        {@endisset}

                        {@isset $category}
                            <span class="bi-bookmark mar10-r">{{ categoryLinks($category) }}</span>
                        {@endisset}

                        {@isset $tags}
                            <span class="bi-tags">{{ tagLinks($tags) }}</span>
                        {@endisset}
                        
                        <span class="b-right t-primary200 t100 pad5-r">•</span>
                    </div>
                
                    <h1 class="t120 mar10-t"><a href="{{ $page_url }}">{* $title *}</a></h1>
                    
                    {@isset $announce}
                        __(t90 mar10-tb) {{ strCropWord($announce, $wordCount) }}
                    {@endisset}
                </div>
            </div>
        </div>
    {@endloop}
</div>
