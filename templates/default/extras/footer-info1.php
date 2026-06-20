<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); ?>

<!-- nosimple -->
<div class="mar30-tb">
{@empty! $category}
    <div class="mar10-r bi-bookmark" title="{@lang Categories}">{{ categoryLinks($category) }}</div>
{@endempty}

{@empty! $tags}
    <div class="mar10-r bi-tags" title="{@lang Tags}">{{ tagLinks($tags) }}</div>
{@endempty}
</div>
<!-- /nosimple -->