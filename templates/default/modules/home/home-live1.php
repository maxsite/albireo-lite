<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$homeTPLfile = TPL_DIR . getConfig('homeTPLfile', 'one-column-3.php');
$paginationTPLfile = TPL_DIR . getConfig('pagination', 'pagination1.php');

$result = getPages(limit: getConfig('homeLimitPagination1', 10));

?>
<div x-data="livePaginationHandler({ initialPage: <?= $result['pagination']['current'] ?>, initialShow: <?= ($result['pagination']['next'] > 0 ? 'true' : 'false') ?>, urlFull: '<?= CURRENT_URL['urlFull'] ?>', before: '<div class=\'animation-fade\'>', after: '</div>' })" @sync-pagination="showButton = $event.detail.show; page = $event.detail.current">
    <div x-ref="items"><?= tpl(data: $result['files'], tpl: $homeTPLfile); ?></div>
    <div x-show="showButton" class="t-center mar20">
        <button class="button bi-arrow-clockwise" @click="loadMore('<?= ajaxURL('ajaxLivePagination_handler') ?>')" :disabled="isLoading"><span x-text="isLoading ? 'Загрузка...' : 'Загрузить ещё'"></span></button>
    </div>
    <div x-ref="pagination"><?= tpl(data: $result['pagination'], tpl: $paginationTPLfile); ?></div>
</div>
