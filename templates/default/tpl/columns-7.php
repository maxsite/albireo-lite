<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

# echo tpl(data: $files, tpl: TPL_DIR . 'columns-7.php', add: ['header' => 'Заголовок', 'description' => 'Описание']);

?>
{@empty! $before}{{$before}}{@endempty}

{@empty! $header}
<div class="h2 mar20-tb">{{ $header }}</div>
{@endempty}

{@empty! $description}
<div class="mar20-tb t-italic">{{ $description }}</div>
{@endempty}

{@loop $DATA}
<h1 class="t100 mar15-t mar10-b"><a class="" href="{{ $page_url }}">{* $title *}</a></h1>
{@endloop}
