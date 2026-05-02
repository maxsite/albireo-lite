<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// https://swiperjs.com/
// https://swiperjs.com/demos
// https://swiperjs.com/swiper-api

/*
use.swiperjs: +
*/

if (checkStr(getPageData('use.swiperjs', false)) === true) {
    echo '<script src="' . RESOURCES_URL . 'swiperjs/swiper-bundle.min.js"></script>';
    echo '<link rel="stylesheet" href="' . RESOURCES_URL . 'swiperjs/swiper-bundle.min.css">';
    echo strRemoveLF('
        <style>
            :root {
                --swiper-theme-color: hsl(var(--primary-hue), var(--primary-sat), 50%);
            }
            .dark {
                --swiper-theme-color: hsl(var(--primary-hue), var(--primary-sat), 80%);
            }
            .swiper {
                width: 100%;
                height: 100%;
            }
            .swiper-slide {
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>');
}

# end of file
