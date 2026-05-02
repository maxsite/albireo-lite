<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); ?>

<!-- nosimple -->
{@loop $DATA}
<div class="mar30-b" style="margin-left: {{ $pathLevel *40 }}px">
    <h4 class="mar5-tb"><i class="bi-dash-lg t100 va-middle"></i><a href="{{ $url }}">{* $caption *}</a>{@isset $count} <sup>{{ $count }}</sup>{@endisset}</h4>

    {@isset $description}{@if $description !== $caption}
    <div class="mar10-b pad20-l t-italic">{{ $description }}</div>
    {@endif}{@endisset}
    
    {@if $pages}
        <ul class="column-count2 column-count1-tablet t90 column-gap40 circle">
        {@foreach $pages as $p}
            <li class="break-inside-avoid"><a href="{* $p['page_url'] *}">{* $p['title'] *}</a></li>
        {@endforeach}
            <li class="break-inside-avoid"><a href="{{ $url }}">...</a></li>
        </ul>
    {@endif}
</div>
{@endloop}
<!-- /nosimple -->