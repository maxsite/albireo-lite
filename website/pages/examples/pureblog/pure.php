<?php if (!defined('BASE_DIR')) exit('No direct script access allowed'); ?><?php
/**
title: Sample PureBlog on Albireo CMS
header: Sample PureBlog on Albireo CMS

description: [announce]
announce: Сегодня утром в мире веб‑разработки случилось необычное: Albireo CMS официально получила титул «CMS, которая улыбается пользователю».
# llms: 

type: blog
date: 2026-04-27 12:00
comments: -

# tags: Lorem, ipsum, dolor
# category: Lorem, ipsum, dolor

images-dir: [UPLOADS_URL]
image-large: [current-path]pure.webp

head-meta[robots]: noindex
compress: +

layout: default.php
css.layout: nofields.css
nav-top: -

extras.start[info1-header.php]: +
no-prompts: +
extras.end[footer-info1.php]: +

headers: headers/header15.php
headers.title: Albireo CMS
headers.subtitle: CMS, которая улыбается пользователю 😺

# menu: menu-pure.php
menu.design: menu-design2.php

footers: footers/footer7.php

css.root[layout-max-width]: 960px
css.root[layout-wrap-padding]: 30px
css.style[]: .container-content {max-width: 800px; padding: 0 20px;}

css.root[body-size-base]: 19px
css.root[h2-font-size]: 2.5rem
css.root[headings-font-weight]: bold

# https://maxsite.org/albireo/build-website/fonts
use.font[lora]: +
css.root[body-font-family]: "Lora"

css.theme: brown.css
# blue.css blue-gray.css brown.css cyan.css cyan2.css gray1.css
# green.css green2.css indigo.css lime.css orange.css pink.css purple.css 
# red.css red2.css teal.css teal2.css violet.css violet2.css yellow.css

css.root[body-bg]: var(--yellow100)
# или css.root[body-bg]: #f5edd6

css.root[body-color]: var(--primary700)
# или css.root[body-color]: #3b2f1e

css.style[]: .dark {--body-bg: var(--primary900); --body-color: var(--primary200);}

links.title: Links

links:
 - https://maxsite.org/2026/pureblog-on-albireo-cms | Создание «PureBlog» на Albireo CMS
 - https://maxsite.org/albireo | Albireo CMS
 - https://maxsite.org/berry | Berry CSS

**/
?>

_(t-italic t-bold t110) Сегодня утром в мире веб‑разработки случилось необычное: Albireo CMS официально получила титул «CMS, которая улыбается пользователю». По словам очевидцев, система запускается так быстро, что некоторые разработчики не успевают допить кофе — сайт уже готов [*](#примечание).

<i>«Я просто скопировал файлы, и сайт появился сам. Такое ощущение, что Albireo CMS работает на магии, а не на PHP»</i>, — поделился один из счастливых блогеров.

Эксперты отмечают, что благодаря встроенной поддержке WebP изображения на сайтах грузятся быстрее, чем котики в мемах. А возможность создавать URL с эмодзи уже породила первый в мире блог, где все статьи начинаются с 🦄✨.

_(mar50-tb t-center) <img src="<?= getPageData('image-large') ?>" alt="Albireo CMS признана самым дружелюбным софтом года" title="Albireo CMS признана самым дружелюбным софтом года">

h3(h4) ❤️ Albireo CMS признана чемпионом по скорости  
На вчерашнем **«Марафоне загрузки страниц»** Albireo CMS пробежала дистанцию за 0.033 секунды. WordPress всё ещё ищет плагин для шнурков...

---

h3(h4) 💛 Разработчики жалуются: Albireo CMS слишком проста  
<i>«Мы привыкли страдать с MySQL и зависимостями, а тут просто скопировал файлы — и сайт готов. Даже скучно!»</i> — признался один фрилансер, который теперь ищет новый источник адреналина.

---

h3(h4) 💚 Первый блог на эмодзи‑URL  
Благодаря Albireo CMS появился сайт, где все статьи начинаются с 🐱🍕🚀. Читатели утверждают, что это самый понятный формат: <i>«Наконец-то можно читать новости без слов!»</i>

---

h3(h4) 💙 Albireo CMS и нейросети: союз века  
Система теперь официально признана «лучшим другом искусственного интеллекта». По слухам, ChatGPT уже завидует: <i>«Albireo CMS понимает меня с полуслова»</i>.

---

h3(h4) 💜 Мультисайтинг как стиль жизни  
Один разработчик случайно создал 12 сайтов одновременно и теперь не может остановиться. <i>«Каждый день новый проект, а всё из одной установки. Чувствую себя космической станцией!»</i> — делится он.

---

h3(h4) 📜 Albireo CMS вошла в Книгу рекордов по “нулевой установке”  
Жюри признало: ни один другой софт не запускается так быстро. Один разработчик успел только сказать «где тут MySQL?» — и сайт уже был онлайн.

---

h3(h4) 😌 Фрилансер случайно создал сайт во сне  
После долгого дня с Albireo CMS он заснул, а утром обнаружил новый лендинг в папке «dreams». Теперь подозревает, что система работает даже в подсознании.

---

h3(h4) 😻 Albireo CMS добавила поддержку эмодзи‑URL — и интернет стал милее  
Пользователи массово переходят на адреса вроде 🌸.blog и 🐧.site. SEO‑специалисты в панике: как теперь считать ключевые слова?

---

h3(h4) 😘 Нейросеть призналась в любви к Albireo CMS  
<i>«Она понимает мои промпты лучше всех!»</i> — заявила нейросеть, добавив, что теперь пишет стихи о чистом PHP и лёгкости бытия.

---

h3(h4) 🚀 Разработчики придумали новый спорт — «копирование сайта на скорость»
Рекорд: 4,2 секунды от загрузки файлов до готового проекта. Судьи подтвердили — без баз данных, без плагинов, без пота.


<?php
$rows = getPages(
    limit: 30,
    where: 'draft = 0 AND type = :type',
    order: 'subdirs ASC, date_unix DESC',
    bindValue: [':type' => 'blog'],
);

if ($rows['files']) {
    echo tpl(data: $rows['files'], tpl: TPL_DIR . 'folders.php', add: ['nolang' => true, 'headerBlock' => 'Архив', 'noinfo' => true]);
}
?>

<a name="примечание"></a>

> Все приведенные на этой странице данные — демонстрационные.

<div class="mar10-r bi-bookmark" title="Categories"><a href="#">Lorem</a>, <a href="#">ipsum</a>, <a href="#">dolor</a></div>
