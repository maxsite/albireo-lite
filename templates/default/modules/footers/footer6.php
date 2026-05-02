<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('footers.title', htmlspecialchars(getConfig('siteTitle')) . ' &copy; ' . getConfig('siteYearCreation', date('Y')) . '-' . date('Y'));

?>
<!-- nosimple -->
<div class="layout-center-wrap t-primary600 -mar20-t">
    <div class="layout-wrap pad15-tb b-shadow-field -bor1 -bor-solid-t -bor-primary400">
        
        <div class="mar10-b bg-primary100 gr-radial-circle dark:gr-radial-circle" style="height: 3px; --gr-start: var(--primary200); --gr-end: var(--white); --gr-start-dark: var(--primary800); --gr-end-dark: var(--primary900);"></div>
        
        <div class="t100">
            &copy; <a href="<?= SITE_URL ?>" class="t-bold"><?= $title ?></a>
        </div>
        <div class="mar10-t t90">
            <?= arrayFormat(getConfigFile(CONFIG_DIR . 'links-footer.php'), '<a class="mar20-r %icon%" href="%url%">%name%</a>'); ?>
        </div>
        <div class="mar5-t t80">
            <span class="bi-cookie"><?= lang('The site uses cookies') ?></span>

            <span class="mar20-l bi-clock-history text-nowrap"><?= number_format(microtime(true) - TIME_START, 3) . 's/' . round(memory_get_usage()/1024/1024, 2) ?>Mb</span>

            <a href="https://maxsite.org/albireo" class="mar20-rl bi-stars text-nowrap"><?= lang('Powered by Albireo CMS') ?></a>
            
            <?php if (defined('LIC_LEGAL_COPY')) : ?>
                <a class="bi-shield-check t-primary500 hover-t-primary400" href="https://maxsite.org/albireo/legality?<?= SITE_HOST ?>">Legal copy of Albireo CMS</a>
            <?php endif ?>
            
        </div>
    </div>
</div>
<!-- /nosimple -->
