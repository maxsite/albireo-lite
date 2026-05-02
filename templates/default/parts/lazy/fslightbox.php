<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// https://fslightbox.com
// use.fslightbox: +

if (checkStr(getPageData('use.fslightbox', false)) === true) {
    echo '<script src="' . RESOURCES_URL . 'fslightbox/fslightbox.js"></script>';
}

/*

[Open image](https://i.imgur.com/fsyrScY.jpg data-fslightbox)

<a data-fslightbox href="https://i.imgur.com/fsyrScY.jpg"><img src="https://i.imgur.com/fsyrScY.jpg" alt="Image"></a>

<a data-fslightbox href="https://i.imgur.com/fsyrScY.jpg">open</a>

<a data-fslightbox="gallery" href="https://i.imgur.com/fsyrScY.jpg">Open the first slide (an image)</a>

<a data-fslightbox="gallery" href="https://www.youtube.com/watch?v=xshEZzpS4CQ">Open the second slide (a YouTube video)</a>

<a data-fslightbox="gallery" href="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4">Open the third slide (an HTML video)</a>

*/

# end of file
