<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// вывод шаблона с сайдбаром
// layout: doc2.php

if (noUserAccessFull()) return;

$_configFile = getPageData('doc.config', 'doc2.php');
$_options = getConfigFile(CONFIG_DIR . $_configFile);

if (!$_options)
    exit('Not doc config...');

require __DIR__ . '/_start.php';
templateModules('headers'); // шапки

?>
<div class="layout-center-wrap"><div class="layout-wrap container-content">
    <div class="flex flex-wrap-tablet">
        <aside id="docNav" class="w300px-min w100-tablet <?= $_options['nav'] ?>" style="<?= $_options['nav-style'] ?>"><?php 
            echo $_options['top'];
            echo '<nav>' . menuDoc(getPageData('doc.config', 'doc2.php')) . '</nav>';
            echo $_options['footer'];
        ?></aside>
        
        <div class="flex-grow5 w100-tablet <?= $_options['article'] ?>"><?php
            require __DIR__ . '/_content.php';
        ?></div>
    </div>
</div></div>
<?php

templateModules('footers'); // подвалы
require __DIR__ . '/_end.php';

# end of file
