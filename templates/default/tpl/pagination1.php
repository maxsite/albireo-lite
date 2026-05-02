<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 
/*
    блок ссылок для пагинации
*/
?>

{@if $max > 1}
<nav>
    {@if $prevLink} 
        <a class="t90 b-inline pad25-rl pad5-tb rounded mar3-r mar10-b hover-no-underline bg-gray50 hover-bg-gray700 t-gray700 hover-t-gray50 dark:bg-primary750 dark:hover-bg-primary700 dark:t-primary200 dark:hover-t-primary50" href="{{ $prevLink }}">←</a>
    {@endif}

    {@foreach $pagLinks as $url => $num}
        {@if $url == 'current'} 
            <span class="t90 b-inline pad15-rl pad7-tb rounded mar3-rl mar10-b bg-primary600 t-white dark:bg-primary100 dark:t-primary700" style="cursor: default">{{ $num }}</span>
        {@else}
            <a class="t90 b-inline pad10-rl pad5-tb rounded mar3-rl mar10-b hover-no-underline bg-gray150 dark:bg-primary500 hover-bg-gray700 dark:hover-bg-primary200 t-gray700 dark:t-primary200 hover-t-gray50 dark:hover-t-primary700" href="{{ $url }}">{{ $num }}</a>
        {@endif}
    {@endforeach}
    
    {@if $nextLink} 
        <a class="t90 b-inline pad25-rl pad5-tb rounded mar3-r mar10-b hover-no-underline bg-gray50 hover-bg-gray700 t-gray700 hover-t-gray50 dark:bg-primary750 dark:hover-bg-primary700 dark:t-primary200 dark:hover-t-primary50" href="{{ $nextLink }}">➝</a>
    {@endif}
</nav>
{@endif}
