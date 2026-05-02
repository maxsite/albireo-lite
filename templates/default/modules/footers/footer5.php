<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('footers.title', htmlspecialchars(getConfig('siteTitle')) . ' &copy; ' . getConfig('siteYearCreation', date('Y')) . '-' . date('Y'));

// $description = getPageData('footers.description', htmlspecialchars(getConfig('siteDescription')));

?>
<!-- nosimple -->
<div class="layout-center-wrap t-white">
    <div class="layout-wrap pad30-tb t-trebuchet bg-primary700 dark:bg-primary800 b-shadow-field">
        <div class="t120">&copy; <a href="<?= SITE_URL ?>" class="t-primary50 t-bold hover-t-primary200 t-small-caps"><?= $title ?></a></div>
        
        <div class="mar10-t">
            <?= arrayFormat(getConfigFile(CONFIG_DIR . 'links-footer.php'), '<a class="mar20-r t-primary200 hover-t-primary200 t90 %icon%" href="%url%">%name%</a>'); ?>
        </div>
        
        <div class="mar10-t t80">
            <span class="t-primary200 bi-cookie"><?= lang('The site uses cookies') ?></span>
            <span class="mar20-l t-primary200 bi-clock-history text-nowrap"><?= number_format(microtime(true) - TIME_START, 3) . 's/' . round(memory_get_usage()/1024/1024, 2) ?>Mb</span>
            <a href="https://maxsite.org/albireo" class="mar20-rl t-primary200 hover-t-primary200 bi-stars text-nowrap"><?= lang('Powered by Albireo CMS') ?></a>
            <?php if (defined('LIC_LEGAL_COPY')) : ?>
                <a class="bi-shield-check t-yellow300 hover-t-yellow300" href="https://maxsite.org/albireo/legality?<?= SITE_HOST ?>">Legal copy of Albireo CMS</a>
            <?php endif ?>
        </div>
    </div>
</div>
<!-- /nosimple -->
