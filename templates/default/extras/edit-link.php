<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*
extras.start[edit-link.php]: +
*/
?>
{@if checkUserAccess(['admin']) }
<div class="b-right"><a class="mar10 bi-card-text t90" href="{{ $link_for_edit }}">Edit</a></div>
{@endif}
