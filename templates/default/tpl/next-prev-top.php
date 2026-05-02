<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); ?>

<nav class="flex flex-wrap mar20-tb">
    <div class="w6col pad10-r">
    {@if $next_url}
         <a href="{{ $next_url }}">←&nbsp;{{ $next_title }}</a>
    {@endif}
    </div>
    <div class="w6col t-right">
    {@if $prev_url}
        <a href="{{ $prev_url }}">{{ $prev_title }}&nbsp;→</a>
    {@endif}
    </div>
</nav>
