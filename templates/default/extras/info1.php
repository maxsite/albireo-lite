<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

/*
date-edit: 2024-01-01 -> указана дата — выводится как дата

либо другой вариант:

# date-edit:           -> нет поля — выводим дату изменения файла
date-edit: 2024-01-01 -> указана дата — выводится как дата
date-edit: -          -> отключить вывод даты

// отключить вывод дат
extras('info1.php', ['nodate' => 0])

// отключить промпты для страницы (см. config/prompts-info1.php)
no-prompts: +
no_prompts: +

// время чтения 4500 — примерно 4 минуты чтения
// примерный объём текста - из-за юникода просто делим на 2

// getConfig('fieldForTags', 'tags'); // поле, где указываются метки, но здесь указываем tags

// $sizeByte = round(filesize($this_file) / 2); // примерный объём текста - из-за юникода просто делим на 2
// echo humanFilesize($sizeByte, 0);



*/

$timeRead = round(round(filesize($this_file) / 2) / 1300);
if ($timeRead < 1) $time = 1;

?>
<!-- nosimple -->
{@check $draft}   
    <span title="{@lang Publication status}" class="pad3 pad10-rl rounded t-red100 bg-red700 mar10-r"><i class="bi-bell-slash-fill"></i>Draft</span>
{@endcheck}

{@empty $nodate}
{@isset $date}
    <span class="mar10-r" title="{@lang Date of publication}"><i class="bi-calendar3"></i>{{ convertDate($date, 'd-m-Y') }}</span>
{@endisset}

{@empty! $date_edit}
    <span class="mar10-r" title="{@lang Last modified date}"> / {{ convertDate($date_edit, 'd-m-Y') }}</span>
{@endempty}
{@endempty}

<span class="mar10-r bi-clock" title="{@lang Estimated reading time}">{@lang Reading time} ~ {{ $timeRead }} {@lang min.}</span>

{@empty! $category}
    <span class="mar10-r bi-bookmark" title="{@lang Categories}">{{ categoryLinks($category) }}</span>
{@endempty}

{@empty! $tags}
    <span class="mar10-r bi-tags" title="{@lang Tags}">{{ tagLinks($tags) }}</span>
{@endempty}

{@check $stat_page}
    {@ $statCountPage = statCountPage() @}
    {@if $statCountPage}
        <span class="mar10-r bi-eye" title="{@lang Post views}">{{ $statCountPage }}</span>
    {@endif}
{@endcheck}

{@if checkUserAccess(['admin']) }
    <a class="mar10-r bi-card-text" href="{{ $link_for_edit }}">Edit</a>
{@endif}

{@check! $no_prompts}
    <select x-data @change="if ($event.target.value) window.open($event.target.value, '_blank')" class="form-input w100px-max"><option value="">AI →</option>
        {?php 
            foreach(promptsInfo('prompts-info1.php', $page_url_full) as $_elem) {
                echo '<option value="' . $_elem[0] . '">' . $_elem[1] . '</option>';
            }
        ?}
    </select>
{@endempty}
<!-- /nosimple -->