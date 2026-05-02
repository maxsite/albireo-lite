<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/*

# https://mermaid.js.org/
use.mermaid: +

*/

if (checkStr(getPageData('use.mermaid', false)) === true) 
    echo strRemoveLF('
<script src="https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.min.js"></script>
<script>mermaid.initialize({startOnLoad: true});</script>
<style>
pre.mermaid {padding: 0; background: none; border: none;}
</style>');

# end of file