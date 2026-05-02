<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

$title = getPageData('footers.title', htmlspecialchars(getConfig('siteTitle')) . ' &copy; ' . getConfig('siteYearCreation', date('Y')) . '-' . date('Y'));

$description = getPageData('footers.description', htmlspecialchars(getConfig('siteDescription')));

// меняем цвет фона контейнера меню для разметки с полями
$fields = getVal('layout.fields', false);
$class1 = $fields ? '' : 'bg-primary750 dark:bg-primary850';

?>
<!-- nosimple -->
<div class="layout-center-wrap t-primary100 hide-print t90 <?= $class1 ?>">
    <div class="layout-wrap flex flex-wrap bg-primary750 dark:bg-primary850 pad30-t pad30-rl b-shadow-field">
        <div class="flex-grow3 w100-tablet pad30-b pad30-r links-no-color hover-no-color">
            <div class="t150 t-primary200 mar10-b t-palatino"><?= $title ?></div>

            <div class=""><?= $description ?></div>

            <hr class="bor-gray700 dotted w600px-max mar20-t">
            
            <?= arrayFormat(getConfigFile(CONFIG_DIR . 'links-footer.php'), '<a class="mar15-r text-nowrap %icon%" href="%url%">%name%</a>'); ?>

            <div class="mar20-t t80 t-gray400">
                <a class="mar15-r bi-stars" href="https://maxsite.org/albireo"><?= lang('Powered by Albireo CMS') ?></a>
                
                <span class="mar15-r bi-cookie"><?= lang('The site uses cookies') ?></span>
                
                <span class="bi-clock-history text-nowrap"><?= number_format(microtime(true) - TIME_START, 3) . 's/' . round(memory_get_usage()/1024/1024, 2) ?>Mb</span>
                
                <?php if (defined('LIC_LEGAL_COPY')) : ?>
                <div><a class="bi-shield-check t-yellow500 hover-t-yellow400" href="https://maxsite.org/albireo/legality?<?= SITE_HOST ?>">Legal copy of Albireo CMS</a></div> 
                <?php endif ?>
                
            </div>
        </div>

        <div class="flex-grow2 w50-tablet links-no-color hover-no-color pad30-b">
            <h5 class="t-primary200 mar0-t"><?= lang('Projects') ?></h5>

            <ul class="list-unstyled">
            <?= arrayFormat(getConfigFile(CONFIG_DIR . 'links-project.php'), '<li><a class="%icon%" href="%url%" target="_blank">%name%</a></li>'); ?>
            </ul>
        </div>

        <div class="flex-grow1 w50-tablet links-no-color hover-no-color pad30-b">
            <h5 class="t-primary200 mar0-t"><?= lang('Links') ?></h5>

            <ul class="list-unstyled">
            <?= arrayFormat(getConfigFile(CONFIG_DIR . 'links-social.php'), '<li><a class="%icon%" href="%url%" rel="nofollow" target="_blank">%name%</a></li>'); ?>
            </ul>
        </div>
    </div>
</div>
<!-- /nosimple -->
