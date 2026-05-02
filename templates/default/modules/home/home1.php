<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$homeTPLfile = getConfig('homeTPLfile', 'one-column-3.php');

$result = getPages(limit: getConfig('homeLimitPagination1', 10));

echo tpl(data: $result['files'], tpl: TPL_DIR . $homeTPLfile);
echo tpl(data: $result['pagination'], tpl: TPL_DIR . getConfig('pagination', 'pagination1.php'));

# end of file
