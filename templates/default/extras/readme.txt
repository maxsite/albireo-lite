Это блоки, которые подключаются в виде tpl-шаблонизатора. В отличие от tpl, здесь нет цикла вывода записей.

_(t-gray t90) <?= extras('info1.php') ?>

Суть их в том, чтобы с их помощью можно было бы добавлять в страницу что-то вроде сниппета, только в виде tpl.

# перед началом контента
extras.start[]: info1
extras.start[]: page-data

# в конце контента
extras.end[]: page-tags
extras.end[]: page-author

Это эквивалентно

echo extras('info1.php');
echo tpl(data: PAGE_DATA, tpl: EXTRAS_DIR . 'info1.php', add: [доп данные]);
