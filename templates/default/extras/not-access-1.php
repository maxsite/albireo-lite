<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); 

// user-lever: admin
// if (noUserAccess(extras: 'not-access-1.php')) return;

?>

<div class="t-brown600 mar20-tb pad20 bordered bor-yellow rounded bg-yellow50">
    {@if getUser()}
    <p class="t150">{@lang Insufficient access level!}</p>
    <p>{@lang Most likely you do not have the necessary permission to view the page.}</p>
    {@else}
    <p class="t150">{@lang The text is available only after authorization!}</p>
    <p>{{ lang('If you are registered on the site, you can <a href="%slogin">log in</a>.', [SITE_URL]) }}</p>
    {@endif}
</div>
