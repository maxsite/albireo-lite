<?php if (!defined("BASE_DIR")) exit("No direct script access allowed");
/**
 * (c) Albireo CMS, https://maxsite.org/albireo, 2020
 */

/**
 * Обрабатывает AJAX-запросы для динамической подгрузки страниц контента (live pagination).
 *
 * Эта функция предназначена для обработки клиентских AJAX-запросов, которые запрашивают
 * следующую порцию контента и обновленные элементы управления пагинацией без полной
 * перезагрузки страницы. Она извлекает текущую страницу и базовый URL из POST-данных,
 * использует их для получения данных через функцию `getPages()`, а затем формирует
 * JSON-ответ, содержащий HTML для новых элементов списка и обновленных ссылок пагинации.
 *
 * Функция также устанавливает специальный HTTP-заголовок `X-Result` для
 * информирования клиента о статусе и состоянии пагинации.
 *
 * Ожидаемые POST-параметры:
 * - `current` (int, optional): Номер страницы, которую необходимо загрузить. По умолчанию 2.
 * - `urlFull` (string, optional): Полный базовый URL для формирования ссылок пагинации.
 *   Если не передан, функция `getPages` должна использовать какой-то дефолтный или текущий URL.
 *
 * @return void Функция не возвращает явного значения, но отправляет HTTP-заголовки и выводит JSON-данные напрямую в поток ответа.
 *
 * @global array $_POST Содержит данные POST-запроса от клиента.
 *
 * @example modules/home/home-live1.php
 *
 */
function ajaxLivePagination_handler()
{
    if (!isAjax()) exit('Access denied!');

    $current = (int)($_POST['current'] ?? 2);
    $urlFull = $_POST['urlFull'] ?? false;
    
    $result = getPages(
        limit: getConfig('homeLimitPagination1', 10),
        paginationCurrent: $current,
        paginationUrl: $urlFull
    );

    $p = $result['pagination'];

    // поскольку TPL_DIR объявляется позже то делаем это вручную на default шаблон
    define('TPL_DIR', TEMPLATES_DIR . 'default' . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR);
    
    $homeTPLfile = TPL_DIR . getConfig('homeTPLfile', 'one-column-3.php');
    $paginationTPLfile = TPL_DIR . getConfig('pagination', 'pagination1.php');

    header('X-Result: ' . json_encode([
        'event' => 'sync-pagination',
        'show' => ($p['next'] > 0),
        'current' => $p['current']
    ]));

    header('Content-Type: application/json');

    echo json_encode([
        'items' => textsimple(tpl(data: $result['files'], tpl: $homeTPLfile)),
        'pagination' => textsimple(tpl(data: $result['pagination'], tpl: $paginationTPLfile)),
    ]);
}

/* Description

<h2>Функция <b>ajaxLivePagination_handler</b></h2>

<p>Функция <code>ajaxLivePagination_handler</code> является серверным обработчиком для AJAX-запросов, реализующих механизм "живой" или динамической пагинации. Она позволяет подгружать новые порции контента и обновлять элементы управления пагинацией без полной перезагрузки страницы, что улучшает пользовательский опыт.</p>

<h3>Сигнатура</h3>

<pre class="php">
function ajaxLivePagination_handler(): void
</pre>

<h3>Аргументы</h3>

<p>Функция не принимает явных аргументов, но обрабатывает данные, переданные через <code>$_POST</code>:</p>

<dl>
    <dt>int <code>$_POST['current']</code> (опционально)</dt>
    <dd>Текущий номер страницы, который должен быть загружен. Это число используется для определения смещения при выборке данных.         По умолчанию: <code>2</code>.</dd>

    <dt>string <code>$_POST['urlFull']</code> (опционально)</dt>
    <dd>Полный URL базовой страницы, который будет использоваться для формирования ссылок в блоке пагинации. Это гарантирует, что ссылки пагинации будут вести на правильные страницы даже при динамической подгрузке. По умолчанию: <code>false</code> (<code>getPages</code> должна использовать текущий URL).</dd>
</dl>

<h3>Результат</h3>

<p>Функция не возвращает явного значения, но отправляет HTTP-заголовки и выводит JSON-объект в тело ответа:</p>

<ul>
    <li><b>HTTP-заголовок <code>X-Result</code></b>: Содержит JSON-строку с метаданными о пагинации:
        <pre>
{
    "event": "sync-pagination", // Обязательное событие для синхронизации
    "show": true | false,       // Флаг, указывающий, есть ли ещё страницы для загрузки (true, если next > 0)
    "current": 123              // Номер текущей страницы после обработки
}
        </pre>
    <p>Этот заголовок позволяет клиентской стороне быстро определить, нужно ли продолжать показывать кнопку "Загрузить ещё" и какая страница является текущей.</p>
    </li>
    <li><b>Тело ответа (JSON)</b>:
        <p>Отправляется с заголовком <code>Content-Type: application/json</code>. Содержит две основные части:</p>
        <pre>
{
    "items": "&lt;div class=\"item\"&gt;...&lt;/div&gt;&lt;div class=\"item\"&gt;...&lt;/div&gt;", // HTML-код новой порции элементов
    "pagination": "&lt;nav class=\"pagination\"&gt;...&lt;/nav&gt;" // HTML-код обновленного блока пагинации
}
        </pre>
        <code>items</code> содержит HTML-код элементов, соответствующих запрошенной странице.
        <code>pagination</code> содержит HTML-код полностью перегенерированных элементов управления пагинацией, что позволяет клиенту просто заменить старый блок пагинации новым.
    </li>
</ul>

<h3>Примеры использования</h3>

<p>См. modules/home/home-live1.php</p>

*/

# end of file
