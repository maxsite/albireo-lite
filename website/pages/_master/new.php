<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: New page
type: blog
date: %%DATE-NOW%%
extras.start[info1-header.php]: +

category:
tags:

draft: +

# https://maxsite.org/albireo/introduction/fields#прочие-библиотеки
# use.glightbox: +
# use.highlight: +
# use.clipboard: +
# use.mermaid: +

images-dir: [UPLOADS_URL]
image-large: [UPLOADS_URL]%%SLUG%%.webp

description: [announce]

announce:

# llms:

**/

createImageText(
    result: UPLOADS_DIR . '%%SLUG%%.webp',
    text: "New//page",
    src: UPLOADS_DIR . 'backgrounds/1.webp',
    sizeText: 80,
    colorText: 'F5F6FB',
    colorShadow: '48525B',
    // RobotoSlab-Regular.ttf Roboto-Regular.ttf RobotoCondensed-Regular.ttf
    ttfFont: UPLOADS_DIR . 'fonts/RobotoCondensed-Regular.ttf',
    quality: 85,
    textAlign: true,
    action: false
);

?>

Text
