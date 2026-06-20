<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

# echo tpl(data: $rows['files'], add: ['headerBlock' => 'Notes', 'nolang' => true, 'delStrFolder' => 'notes/', 'noinfo' => true], tpl: TPL_DIR . 'folders.php');

// используется для организации групп
$oldHeader = '';
$favoriteMarker = '⭐️ ';

// удаление части строки в заголовке $subdirs
if (empty($delStrFolder)) $delStrFolder = '';

?>
{@empty! $headerBlock}
<div class="h2 mar20-tb">{{ $headerBlock }}</div>
{@endempty}

<!-- nosimple -->
<ul class="mar10-tb circle t-primary500">
{@loop $DATA}
    {@if $oldHeader != $subdirs}
        {@if $subdirs != '.'}
            {@check $nolang}
                <li class="h3 mar20-t mar0-b marker-square">{* strUcFirst(strFirstDotClean(str_replace($delStrFolder, '', $subdirs))) *}</li>
            {@else}
                <li class="h3 mar20-t mar0-b marker-square">{* lang(strUcFirst(strFirstDotClean(str_replace($delStrFolder, '', $subdirs)))) *}</li>
            {@endcheck}
        {@endif}
        {@ $oldHeader = $subdirs @}
    {@endif}

    <li class="t80 t-primary500" {@check $favorite}style="list-style-type: '{{ $favoriteMarker }}';"{@endcheck}>
        <div class="flex flex-wrap-tablet flex-vcenter">
            <div class="mar10-r">
                {@empty! $header}
                    <a class="t100" href="{* $page_url *}">{* $header *}</a>
                {@else}
                    <a class="t100" href="{* $page_url *}">{* $title *}</a>
                {@endempty}
                {@empty! $_new} <span class="mar10-rl t80 bg-primary100 dark:bg-primary600 dark:t-primary300 pad3-rl rounded5">new</span> {@endempty}
            </div>
            
            {@empty $noinfo}
            <div class="w100-tablet t-right t-left-tablet t-gray300 dark:t-primary700 links-no-color">  {@empty! $category} <span class="bi-bookmark mar10-r">{{ categoryLinks($category) }}</span> {@endempty} {@empty! $tags} <span class="bi-tags mar10-r">{{ tagLinks($tags) }}</span> {@endempty} {@empty! $date} <span class="bi-calendar t-nowrap">{{ convertDate($date, 'Y/m/d') }}</span> {@endempty}</div>
            {@endempty}
        </div>
    </li>
{@endloop}
</ul>
<!-- /nosimple -->