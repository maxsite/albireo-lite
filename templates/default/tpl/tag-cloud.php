<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); ?>

<div class="h2 mar20-tb">{@lang Tags}</div>

{@foreach $tags as $name => $count}
    <a class="t90 b-inline pad10-rl pad5-tb rounded mar5-r mar10-b hover-no-underline bg-gray100 hover-bg-gray700 t-gray700 hover-t-gray50 dark:bg-primary600 dark:t-primary200 dark:hover-bg-primary200 dark:hover-t-primary700" href="{{ $basePath . $name }}">{* $name *} <sup>{{ $count }}</sup></a>
{@endforeach}
