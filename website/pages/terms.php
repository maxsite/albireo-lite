<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');
/**

title: Условия использования и копирайты
description: Условия использования и копирайты
type: system

# языки на которых будет работать страница
lang: ru, en, uk, de, pl

# переводы полей
lang.en[title]: Terms of Use and Copyright
lang.uk[title]: Умови використання та копірайти
lang.de[title]: Nutzungsbedingungen und Urheberrechte
lang.pl[title]: Warunki użytkowania i prawa autorskie

lang.en[description]: Terms of Use and Copyright
lang.uk[description]: Умови використання та копірайти
lang.de[description]: Nutzungsbedingungen und Urheberrechte
lang.pl[description]: Warunki użytkowania i prawa autorskie

**/

?>

<!-- nosimple --><svg viewBox="0 0 800 130" xmlns="http://www.w3.org/2000/svg"> <style> @namespace svg url(http://www.w3.org/2000/svg); svg { font-family: Helvetica, Arial, sans-serif; text-rendering: geometricPrecision; } svg|a:link, svg|a:visited { cursor: pointer; } .flag-blue { fill: #0056b3; } .flag-yellow { fill: #ffd700; } .message { fill: white; font-size: 18px; } .call { fill: black; font-size: 22px; } .arrow { font-size: 14px; } </style> <defs> <clipPath id="round-corners"><rect width="100%" height="100%" rx="3" /></clipPath> </defs> <a href="https://stand-with-ukraine.pp.ua" target="_blank"> <g clip-path="url(#round-corners)"> <rect x="0" y="0" width="100%" height="100%" class="flag-yellow"/> <rect x="0" y="0" width="100%" height="90px" class="flag-blue"/> </g> <text x="0" y="25" class="message"> <tspan x="30" dy="0.8em">Russia invaded Ukraine, killing tens of thousands of civilians and displacing millions more.</tspan> <tspan x="30" dy="1.2em">It's a genocide. Please help us defend freedom, democracy and Ukraine's right to exist.</tspan> </text> <text x="50%" y="86%" dominant-baseline="middle" text-anchor="middle" class="call">Help Ukraine Now <tspan dominant-baseline="middle" class="arrow">➔</tspan> </text> </a> </svg><!-- /nosimple -->

<?php if (getPageData('user-lang') == 'uk') : ?>

__(t-red t-center t-italic mar20-b) Цей сайт не працює з росією та її громадянами.

h1 Умови використання та копірайти

Відкриті матеріали сайту розповсюджуються за ліцензією <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed" target="_blank">Attribution-NonCommercial-NoDerivs</a> (CC BY-NC-ND 4.0).

- Ви можете вільно ділитися (обмінюватися) — копіювати та розповсюджувати матеріал на будь-якому носії та у будь-якому форматі.
- Ми не маємо права відкликати ці дозволи, доки ви виконуєте умови ліцензії.
- Без будь-яких гарантій.

При **обов'язковому дотриманні** наступних умов:

- Ви повинні вказувати авторство цього сайту - надати пряме посилання на <code><?= SITE_URL ?></code> або сторінку, звідки скопійовано матеріал.
- Ви не маєте права використовувати будь-які матеріали сайту в комерційних цілях.
- Якщо ви створюєте свій матеріал і за основу берете матеріали нашого сайту, ви не можете поширювати свій змінений матеріал.

---

Наш сайт використовує cookies. Це технічна потреба. За потреби ви можете працювати з сайтом у режимі анонімного перегляду браузера.

---

- Сайт працює на &copy; <a href="https://maxsite.org/albireo">Albireo CMS</a>
- &copy; <a href="https://maxsite.org/berry">Berry CSS</a>
- &copy; <a href="https://alpinejs.dev/">Alpine.JS</a>
- &copy; <a href="https://icons.getbootstrap.com/">Bootstrap Icons</a>
/ul

<?php elseif (getPageData('user-lang') == 'en') : ?>

__(t-red t-center t-italic mar20-b) This site does not work with russia and its citizens.

h1 Terms of Use and Copyright

Open materials of the site are distributed under license <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed" target="_blank">Attribution-NonCommercial-NoDerivs</a> (CC BY-NC-ND 4.0).

- You are free to share (exchange) - copy and distribute the material on any medium and in any format.
- We cannot revoke these permissions as long as you comply with the terms of the license.
- Without any guarantees.

Subject to **mandatory compliance** with the following conditions:


- You must give credit to this site - provide a direct link to <code><?= SITE_URL ?></code> or the page from which the material was copied.
- You may not use any materials on the site for commercial purposes.
- If you create your own material and use materials from our site as a basis, you cannot distribute your modified material.

---

Our website uses cookies. This is a technical necessity. If necessary, you can work with the site in anonymous browser browsing mode.

---

- The site is powered by &copy; <a href="https://maxsite.org/albireo">Albireo CMS</a>
- &copy; <a href="https://maxsite.org/berry">Berry CSS</a>
- &copy; <a href="https://alpinejs.dev/">Alpine.JS</a>
- &copy; <a href="https://icons.getbootstrap.com/">Bootstrap Icons</a>

<?php elseif (getPageData('user-lang') == 'de') : ?>

__(t-red t-center t-italic mar20-b) Diese Website arbeitet nicht mit russland und seinen Bürgern.

h1 Nutzungsbedingungen und Urheberrechte

Offene Materialien der Website werden unter der Lizenz <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed" target="_blank">Attribution-NonCommercial-NoDerivs</a> (CC BY-NC-ND 4.0) verbreitet.

- Sie können frei teilen (austauschen) — das Material auf jedem Medium und in jedem Format kopieren und verbreiten.
- Wir sind nicht berechtigt, diese Berechtigungen zu widerrufen, solange Sie die Lizenzbedingungen einhalten.
- Ohne jegliche Garantien.


Bei **zwingender Einhaltung** folgender Bedingungen:

- Sie müssen die Urheberschaft dieser Website angeben — einen direkten Link zu <code><?= SITE_URL ?></code> oder zur Seite bereitstellen, von der das Material kopiert wurde.
- Sie sind nicht berechtigt, jegliches Material der Website für kommerzielle Zwecke zu nutzen.
- Wenn Sie eigenes Material erstellen und Materialien unserer Website als Grundlage verwenden, dürfen Sie Ihr verändertes Material nicht verbreiten.

---

Unsere Website verwendet Cookies. Dies ist eine technische Notwendigkeit. Bei Bedarf können Sie die Website im anonymen Browsermodus nutzen.

---

- Die Website läuft mit &copy; <a href="https://maxsite.org/albireo">Albireo CMS</a>
- &copy; <a href="https://maxsite.org/berry">Berry CSS</a>
- &copy; <a href="https://alpinejs.dev/">Alpine.JS</a>
- &copy; <a href="https://icons.getbootstrap.com/">Bootstrap Icons</a>

<?php elseif (getPageData('user-lang') == 'pl') : ?>

__(t-red t-center t-italic mar20-b) Ta strona nie współpracuje z rosją i jej obywatelami.

h1 Warunki użytkowania i prawa autorskie

Otwarte materiały strony są rozpowszechniane na licencji <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed" target="_blank">Attribution-NonCommercial-NoDerivs</a> (CC BY-NC-ND 4.0).

- Możesz swobodnie dzielić się (wymieniać) — kopiować i rozpowszechniać materiał na dowolnym nośniku i w dowolnym formacie.
- Nie jesteśmy uprawnieni do cofnięcia tych zezwoleń, dopóki przestrzegasz warunków licencji.
- Bez żadnych gwarancji.

Przy **obowiązkowym przestrzeganiu** następujących warunków:

- Musisz wskazać autorstwo tej strony — podać bezpośredni link do <code><?= SITE_URL ?></code> lub strony, z której skopiowano materiał.
- Nie jesteś uprawniony do wykorzystywania jakichkolwiek materiałów strony w celach komercyjnych.
- Jeśli tworzysz własny materiał i opierasz się na materiałach naszej strony, nie możesz rozpowszechniać swojego zmienionego materiału.

---

Nasza strona wykorzystuje cookies. Jest to konieczność techniczna. W razie potrzeby możesz korzystać ze strony w trybie przeglądania anonimowego w przeglądarce.

---

- Strona działa na &copy; <a href="https://maxsite.org/albireo">Albireo CMS</a>
- &copy; <a href="https://maxsite.org/berry">Berry CSS</a>
- &copy; <a href="https://alpinejs.dev/">Alpine.JS</a>
- &copy; <a href="https://icons.getbootstrap.com/">Bootstrap Icons</a>

<?php else : ?>

__(t-red t-center t-italic mar20-b) Этот сайт не работает с россией и её гражданами.

h1 Условия использования и копирайты

Открытые материалы сайта распространяются по лицензии <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed" target="_blank">Attribution-NonCommercial-NoDerivs</a> (CC BY-NC-ND 4.0).

- Вы можете свободно делиться (обмениваться) — копировать и распространять материал на любом носителе и в любом формате.
- Мы не вправе отозвать эти разрешения, пока вы выполняете условия лицензии.
- Без каких-либо гарантий.

При **обязательном соблюдении** следующих условий:

- Вы должны указывать авторство этого сайта - предоставить прямую ссылку на <code><?= SITE_URL ?></code> или страницу, откуда скопирован материал.
- Вы не вправе использовать любые материалы сайта в коммерческих целях.
- Если вы создаёте свой материал и за основу берёте материалы нашего сайта, то вы не можете распространять свой измененный материал.

---

Наш сайт использует cookies. Это техническая необходимость. При желании вы можете работать с сайтом в режиме анонимного просмотра браузера.

---

- Сайт работает на &copy; <a href="https://maxsite.org/albireo">Albireo CMS</a>
- &copy; <a href="https://maxsite.org/berry">Berry CSS</a>
- &copy; <a href="https://alpinejs.dev/">Alpine.JS</a>
- &copy; <a href="https://icons.getbootstrap.com/">Bootstrap Icons</a>

<?php endif ?>
